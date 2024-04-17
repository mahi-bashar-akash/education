<?php

namespace App\Http\Controllers;

use App\Models\FeesTypes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeesTypesController extends BaseController
{
    public function list(Request $request){
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $FeesTypes = FeesTypes::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $FeesTypes->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('duration', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $FeesTypes = $FeesTypes->paginate($limit);

            return ['message' => 'Show fees types list data successfully' ,'data' => $FeesTypes];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function create(Request $request){
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $feesTypes = new FeesTypes();
            $admin_id = Auth::guard('admins')->id();
            $feesTypes->name = $request->name;
            $feesTypes->admin_id = $admin_id;
            $feesTypes->save();
            return ['message' => 'Fees types has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function single(Request $request){
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
            $feesTypes = FeesTypes::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($feesTypes == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $feesTypes];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function update(Request $request){
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                    'name' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $feesTypes = FeesTypes::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($feesTypes == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            $feesTypes->name = $request->name;
            $feesTypes->save();
            return ['message' => 'Fees types has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function delete(Request $request){
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
            FeesTypes::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Fees types has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
