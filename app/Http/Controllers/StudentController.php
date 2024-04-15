<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends BaseController
{

    public function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $courses = Student::with('course_info')->where('admin_id', $admin_id)->orderby('id', 'asc');

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

            return ['message' => 'Show student list data successfully' ,'data' => $courses];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'admission_date' => 'required',
                    'name' => 'required',
                    'roll_or_id' => 'required|String',
                    'phone' => 'required|String',
                    'email' => 'required',
                    'course_id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $course = new Student();
            $admin_id = Auth::guard('admins')->id();
            $course->admission_date = $request->admission_date;
            $course->name = $request->name;
            $course->roll_or_id = $request->roll_or_id;
            $course->phone = $request->phone;
            $course->email = $request->email;
            $course->course_id = $request->course_id;
            $course->admin_id = $admin_id;
            $course->save();
            return ['message' => 'Student has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function single(Request $request) {
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
            $course = Student::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Professor data not found'];
            }
            return ['message' => 'show single data successfully','data' => $course];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function update(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                    'admission_date' => 'required',
                    'name' => 'required',
                    'roll_or_id' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'course_id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $course = Student::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Professor data not found'];
            }
            $course->admission_date = $request->admission_date;
            $course->name = $request->name;
            $course->roll_or_id = $request->roll_or_id;
            $course->phone = $request->phone;
            $course->email = $request->email;
            $course->course_id = $request->course_id;
            $course->save();
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
