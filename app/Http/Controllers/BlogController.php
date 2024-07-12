<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends BaseController
{

    public static function list(Request $request) {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $blogs = Blog::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $blogs->where(
                    function ($q) use ($keyword) {
                        $q->where('title', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('author_name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('description', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $blogs = $blogs->paginate($limit);

            return ['message' => 'Show blog list data successfully' ,'data' => $blogs];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function create(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required|string',
                    'author_name' => 'required|string',
                    'description' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $blog = new Blog();
            $admin_id = Auth::guard('admins')->id();
            $blog->title = $request->title;
            $blog->avatar = $request->avatar ?? null;
            $blog->author_name = $request->author_name;
            $blog->description = $request->description;
            $blog->admin_id = $admin_id;
            $blog->save();
            return ['message' => 'Blog has been saved successfully.'];
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
            $blog = Blog::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($blog == null){
                return ['status' => 500, 'errors' => 'Blog data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $blog];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function update(Request $request) {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required|string',
                    'author_name' => 'required|string',
                    'description' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $blog = Blog::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($blog == null){
                return ['status' => 500, 'errors' => 'Blog data not found'];
            }
            $blog->title = $request->title;
            $blog->avatar = $request->avatar ?? null;
            $blog->author_name = $request->author_name;
            $blog->description = $request->description;
            $blog->save();
            return ['message' => 'Blog has been updated successfully.'];
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
            Blog::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Blog has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function blogList(Request $request)
    {
        try {
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $blogs = Blog::orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $blogs->where(
                    function ($q) use ($keyword) {
                        $q->where('title', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('author_name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('description', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $blogs = $blogs->paginate($limit);

            return ['message' => 'Show all data list successfully.' ,'data' => $blogs];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function blogDetails(Request $request) {
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
            $blog = Blog::where('id', $request->id)->first();
            if($blog == null){
                return ['status' => 500, 'errors' => 'Blog details data not found.'];
            }
            return ['message' => 'Show single data successfully','data' => $blog];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
