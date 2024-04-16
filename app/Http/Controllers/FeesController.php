<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeesController extends BaseController
{
    public static function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $fees = Fees::with('student_id')->where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $fees->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('duration', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $fees = $fees->paginate($limit);

            return ['message' => 'Show fees list data successfully' ,'data' => $fees];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'student_id' => 'required',
                    'fees_type' => 'required',
                    'fees_amount' => 'required',
                    'payment_type' => 'required',
                    'payment_status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $fees = new Fees();
            $admin_id = Auth::guard('admins')->id();
            $fees->student_id = $request->student_id;
            $fees->fees_type = $request->fees_type;
            $fees->fees_amount = $request->fees_amount;
            $fees->payment_type = $request->payment_type;
            $fees->payment_status = $request->payment_status;
            $fees->admin_id = $admin_id;
            $fees->save();
            return ['message' => 'Fees has been saved successfully.'];
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
            $fees = Fees::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($fees == null){
                return ['status' => 500, 'errors' => 'Fees data not found'];
            }
            return ['message' => 'show single data successfully','data' => $fees];
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
                    'student_id' => 'required',
                    'fees_type' => 'required',
                    'fees_amount' => 'required',
                    'payment_type' => 'required',
                    'payment_status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $fees = Fees::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($fees == null){
                return ['status' => 500, 'errors' => 'Fees data not found'];
            }
            $fees->student_id = $request->student_id;
            $fees->fees_type = $request->fees_type;
            $fees->fees_amount = $request->fees_amount;
            $fees->payment_type = $request->payment_type;
            $fees->payment_status = $request->payment_status;
            $fees->save();
            return ['message' => 'Fees has been updated successfully.'];
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
            Fees::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Fees has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
