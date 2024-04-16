<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfessorController extends BaseController
{

    public static function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $professor = Professor::with('department_info')->where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $professor->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('email', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $professor = $professor->paginate($limit);

            return ['message' => 'Show professor list data successfully' ,'data' => $professor];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|String',
                    'email' => 'required|email',
                    'educational_qualification' => 'required|String',
                    'department_id' => 'required',
                    'phone' => 'required|String',
                    'joining_date' => 'required|String',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $professor = new Professor();
            $admin_id = Auth::guard('admins')->id();
            $professor->name = $request->name;
            $professor->email = $request->email;
            $professor->educational_qualification = $request->educational_qualification;
            $professor->department_id = $request->department_id;
            $professor->phone = $request->phone;
            $professor->joining_date = $request->joining_date;
            $professor->admin_id = $admin_id;
            $professor->save();
            return ['message' => 'Professor has been saved successfully.'];
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
            $professor = Professor::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($professor == null){
                return ['status' => 500, 'errors' => 'Professor data not found'];
            }
            return ['message' => 'show single data successfully','data' => $professor];
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
                    'name' => 'required|String',
                    'email' => 'required|email',
                    'educational_qualification' => 'required|String',
                    'department_id' => 'required',
                    'phone' => 'required|String',
                    'joining_date' => 'required|String',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $professor = Professor::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($professor == null){
                return ['status' => 500, 'errors' => 'Professor data not found'];
            }
            $professor->name = $request->name;
            $professor->email = $request->email;
            $professor->educational_qualification = $request->educational_qualification;
            $professor->department_id = $request->department_id;
            $professor->phone = $request->phone;
            $professor->joining_date = $request->joining_date;
            $professor->save();
            return ['message' => 'Professor has been updated successfully.'];
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
            Professor::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Professor has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
