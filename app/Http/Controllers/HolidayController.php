<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HolidayController extends BaseController
{
    public static function list (Request $request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $holiday = Holiday::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $holiday->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('guest', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('location', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $holiday = $holiday->paginate($limit);

            return ['message' => 'Show holiday list data successfully' ,'data' => $holiday];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create (Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string',
                    'types' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'description' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $holiday = new Holiday();
            $admin_id = Auth::guard('admins')->id();
            $holiday->name = $request->name;
            $holiday->types = $request->types;
            $holiday->start_date = $request->start_date;
            $holiday->end_date = $request->end_date;
            $holiday->description = $request->description;
            $holiday->admin_id = $admin_id;
            $holiday->save();
            return ['message' => 'Holiday has been saved successfully.'];
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
            $holiday = Holiday::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($holiday == null){
                return ['status' => 500, 'errors' => 'Holiday not found'];
            }
            return ['message' => 'Show single data successfully','data' => $holiday];
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
                    'name' => 'required|string',
                    'types' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'description' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $holiday = Holiday::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($holiday == null){
                return ['status' => 500, 'errors' => 'Holiday not found'];
            }
            $holiday->name = $request->name;
            $holiday->types = $request->types;
            $holiday->start_date = $request->start_date;
            $holiday->end_date = $request->end_date;
            $holiday->description = $request->description;
            $holiday->save();
            return ['message' => 'Holiday has been updated successfully.'];
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
            Holiday::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Holiday has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
