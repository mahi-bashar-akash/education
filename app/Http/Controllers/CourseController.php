<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends BaseController
{

    public function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $courses = Course::with('professor_info')->where('admin_id', $admin_id)->orderby('id', 'asc');

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

            return ['message' => 'Show course list data successfully' ,'data' => $courses];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'student_enroll_capacity' => 'required',
                    'name' => 'required|String',
                    'professor_id' => 'required',
                    'price' => 'required',
                    'duration' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $course = new Course();
            $admin_id = Auth::guard('admins')->id();
            $course->student_enroll_capacity = $request->student_enroll_capacity;
            $course->name = $request->name;
            $course->professor_id = $request->professor_id;
            $course->price = $request->price;
            $course->duration = $request->duration;
            $course->description = $request->description;
            $course->admin_id = $admin_id;
            $course->save();
            return ['message' => 'Course has been saved successfully.'];
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
            $course = Course::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Course data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $course];
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
                    'student_enroll_capacity' => 'required',
                    'name' => 'required',
                    'professor_id' => 'required',
                    'price' => 'required',
                    'duration' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $course = Course::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($course == null){
                return ['status' => 500, 'errors' => 'Course data not found'];
            }
            $course->student_enroll_capacity = $request->student_enroll_capacity;
            $course->name = $request->name;
            $course->professor_id = $request->professor_id;
            $course->price = $request->price;
            $course->duration = $request->duration;
            $course->save();
            return ['message' => 'Course has been updated successfully.'];
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
            Course::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Course has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
