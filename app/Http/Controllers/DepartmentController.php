<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class DepartmentController extends BaseController
{

    public function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $departments = Department::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $departments->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('email', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $departments = $departments->paginate($limit);

            return ['message' => 'Show department list data successfully' ,'data' => $departments];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|String',
                    'head_of_department' => 'required|String',
                    'phone' => 'required|String',
                    'email' => 'required|email',
                    'start_year' => 'required|String',
                    'stuff_capacity' => 'required|String',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $department = new Department();
            $admin_id = Auth::guard('admins')->id();
            $department->name = $request->name;
            $department->head_of_department = $request->head_of_department;
            $department->phone = $request->phone;
            $department->email = $request->email;
            $department->start_year = $request->start_year;
            $department->stuff_capacity = $request->stuff_capacity;
            $department->admin_id = $admin_id;
            $department->save();
            return ['message' => 'Department has been saved successfully.'];
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
            $department = Department::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($department == null){
                return ['status' => 500, 'errors' => 'Department not found'];
            }
            return ['message' => 'show single data successfully','data' => $department];
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
                    'name' => 'required|String',
                    'head_of_department' => 'required|String',
                    'phone' => 'required|String',
                    'email' => 'required|email',
                    'start_year' => 'required|String',
                    'stuff_capacity' => 'required|String',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $department = Department::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($department == null){
                return ['status' => 500, 'errors' => 'Department not found'];
            }
            $department->name = $request->name;
            $department->head_of_department = $request->head_of_department;
            $department->phone = $request->phone;
            $department->email = $request->email;
            $department->start_year = $request->start_year;
            $department->stuff_capacity = $request->stuff_capacity;
            $department->save();
            return ['message' => 'Department has been updated successfully.'];
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
            Department::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Department has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
