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
            $courses = Fees::with('student_id')->where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $courses->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('duration', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $courses = $courses->paginate($limit);

            return ['message' => 'Show fees list data successfully' ,'data' => $courses];
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
                    'fees_amount' => 'required|String',
                    'payment_type' => 'required|String',
                    'payment_status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $course = new Fees();
            $admin_id = Auth::guard('admins')->id();
            $course->student_id = $request->student_id;
            $course->fees_type = $request->fees_type;
            $course->fees_amount = $request->fees_amount;
            $course->payment_type = $request->payment_type;
            $course->payment_status = $request->payment_status;
            $course->admin_id = $admin_id;
            $course->save();
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
            $course = Fees::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Fees data not found'];
            }
            return ['message' => 'show single data successfully','data' => $course];
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
                    'fees_amount' => 'required|String',
                    'payment_type' => 'required|String',
                    'payment_status' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $course = Fees::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Fees data not found'];
            }
            $course->student_id = $request->student_id;
            $course->fees_type = $request->fees_type;
            $course->fees_amount = $request->fees_amount;
            $course->payment_type = $request->payment_type;
            $course->payment_status = $request->payment_status;
            $course->save();
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
