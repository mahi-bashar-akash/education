<?php

namespace App\Http\Controllers;

use App\Models\LibraryAsset;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LibraryAssetController extends BaseController
{

    public static function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $libraryAsset = LibraryAsset::with('department_info')->where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $libraryAsset->where(
                    function ($q) use ($keyword) {
                        $q->where('author', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('subject', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $libraryAsset = $libraryAsset->paginate($limit);

            return ['message' => 'Show library asset list data successfully' ,'data' => $libraryAsset];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'author' => 'required|string',
                    'name' => 'required|string',
                    'subject' => 'required|string',
                    'price' => 'required',
                    'department_id' => 'required',
                    'status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $libraryAsset = new LibraryAsset();
            $admin_id = Auth::guard('admins')->id();
            $libraryAsset->author = $request->author;
            $libraryAsset->name = $request->name;
            $libraryAsset->subject = $request->subject;
            $libraryAsset->price = $request->price;
            $libraryAsset->department_id = $request->department_id;
            $libraryAsset->status = $request->status;
            $libraryAsset->admin_id = $admin_id;
            $libraryAsset->save();
            return ['message' => 'Library asset has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function single(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $libraryAsset = LibraryAsset::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($libraryAsset == null){
                return ['status' => 500, 'errors' => 'Library asset data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $libraryAsset];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function update(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                    'author' => 'required|string',
                    'name' => 'required|string',
                    'subject' => 'required|string',
                    'price' => 'required',
                    'department_id' => 'required',
                    'status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $libraryAsset = LibraryAsset::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($libraryAsset == null){
                return ['status' => 500, 'errors' => 'Library asset data not found'];
            }
            $libraryAsset->author = $request->author;
            $libraryAsset->name = $request->name;
            $libraryAsset->subject = $request->subject;
            $libraryAsset->price = $request->price;
            $libraryAsset->department_id = $request->department_id;
            $libraryAsset->status = $request->status;
            $libraryAsset->save();
            return ['message' => 'Library asset has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete(Request $request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'ids' => 'required|array',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            LibraryAsset::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Library Asset has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
