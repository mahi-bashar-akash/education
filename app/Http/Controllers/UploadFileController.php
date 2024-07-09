<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class UploadFileController extends BaseController
{

    public function uploadFile(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'file' =>  'required|file',
                'media_type' => 'required|integer', //1.image 2. video 3. file
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $image_file = $request->file('file');
            $attrs = array(
                'filename' => $image_file->getClientOriginalName(),
                'extension' => $image_file->getClientOriginalExtension(),
                'size' => $image_file->getSize(),
                'mimeType' => $image_file->getMimeType()
            );
            if ($input['media_type'] == 1) {
                $filePath = Storage::disk('public')->put('/media/image', $input['file']);
            } else {
                $file_name = time().'-'.strtolower(str_replace(' ', '-', $attrs['filename']));
                $filePath = '/media/file/'.$file_name;
                Storage::disk('public')->put($filePath, file_get_contents($image_file));
            }
            $new_name = basename($filePath);
            $MediaModel = new Media();
            $MediaModel->file_path = $new_name;
            $MediaModel->media_type = $input['media_type'];
            $MediaModel->attrs = serialize($attrs);
            $MediaModel->created_at = Carbon::now();
            $MediaModel->save();
            return ['status' => 200, 'data' => $MediaModel->toArray(), 'file_name' => $image_file->getClientOriginalName(),  'msg' => 'Data has been added successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public function deleteFile(Request $request, $id)
    {
        try {
            $media = Media::findOrFail($id);
            $filePath = '';
            if ($media->media_type == 1) {
                $filePath = 'public/media/image/' . $media->file_path;
                $storagePath = storage_path('app/' . $filePath);
            } elseif ($media->media_type == 2) {
                $filePath = 'public/media/file/' . $media->file_path;
                $storagePath = storage_path('app/' . $filePath);
            }
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            if ($storagePath && file_exists($storagePath)) {
                unlink($storagePath);
            }
            $media->delete();
            return response()->json(['status' => 200, 'msg' => 'File deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => $e->getMessage()]);
        }
    }

}
