<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskingQuestion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrequentlyAskingQuestionController extends BaseController
{
    public static function list (Request $request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $frequentlyAskingQuestion = FrequentlyAskingQuestion::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $frequentlyAskingQuestion->where(
                    function ($q) use ($keyword) {
                        $q->where('question', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('answer', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $frequentlyAskingQuestion = $frequentlyAskingQuestion->paginate($limit);

            return ['message' => 'Show frequently asking question list data successfully' ,'data' => $frequentlyAskingQuestion];
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
                    'question' => 'required|string',
                    'answer' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $frequentlyAskingQuestion = new FrequentlyAskingQuestion();
            $admin_id = Auth::guard('admins')->id();
            $frequentlyAskingQuestion->question = $request->question;
            $frequentlyAskingQuestion->answer = $request->answer;
            $frequentlyAskingQuestion->admin_id = $admin_id;
            $frequentlyAskingQuestion->save();
            return ['message' => 'Frequently asking question has been saved successfully.'];
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
            $frequentlyAskingQuestion = FrequentlyAskingQuestion::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($frequentlyAskingQuestion == null){
                return ['status' => 500, 'errors' => 'FrequentlyAskingQuestion not found'];
            }
            return ['message' => 'Show single data successfully','data' => $frequentlyAskingQuestion];
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
                    'question' => 'required|string',
                    'answer' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $frequentlyAskingQuestion = FrequentlyAskingQuestion::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($frequentlyAskingQuestion == null){
                return ['status' => 500, 'errors' => 'FrequentlyAskingQuestion not found'];
            }
            $frequentlyAskingQuestion->question = $request->question;
            $frequentlyAskingQuestion->answer = $request->answer;
            $frequentlyAskingQuestion->save();
            return ['message' => 'Frequently asking question has been updated successfully.'];
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
            FrequentlyAskingQuestion::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Frequently asking question has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function faqList(Request $request)
    {
        try {
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $blogs = FrequentlyAskingQuestion::orderby('id', 'asc');

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

            return ['message' => 'Show all blog list data successfully.' ,'data' => $blogs];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function faqDetails(Request $request) {
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
            $blog = FrequentlyAskingQuestion::where('id', $request->id)->first();
            if($blog == null){
                return ['status' => 500, 'errors' => 'Blog details data not found.'];
            }
            return ['message' => 'Show single data successfully','data' => $blog];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
