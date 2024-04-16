<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{

    public static function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $students = Student::with('course_info')->where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $students->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('price', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('duration', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $students = $students->paginate($limit);

            return ['message' => 'Show student list data successfully' ,'data' => $students];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'admission_date' => 'required',
                    'name' => 'required|string',
                    'roll_or_id' => 'required|string',
                    'phone' => 'required|string',
                    'email' => 'required|email',
                    'course_id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $student = new Student();
            $admin_id = Auth::guard('admins')->id();
            $student->admission_date = $request->admission_date;
            $student->name = $request->name;
            $student->roll_or_id = $request->roll_or_id;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->course_id = $request->course_id;
            $student->admin_id = $admin_id;
            $student->save();
            return ['message' => 'Student has been saved successfully.'];
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
            $student = Student::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($student == null){
                return ['status' => 500, 'errors' => 'Student data not found'];
            }
            return ['message' => 'show single data successfully','data' => $student];
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
                    'admission_date' => 'required',
                    'name' => 'required|string',
                    'roll_or_id' => 'required|string',
                    'phone' => 'required|string',
                    'email' => 'required|email',
                    'course_id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $student = Student::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($student == null){
                return ['status' => 500, 'errors' => 'Student data not found'];
            }
            $student->admission_date = $request->admission_date;
            $student->name = $request->name;
            $student->roll_or_id = $request->roll_or_id;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->course_id = $request->course_id;
            $student->save();
            return ['message' => 'Student has been updated successfully.'];
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
            Student::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Student has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
