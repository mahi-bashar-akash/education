<?php

namespace App\Http\Controllers;

use App\Models\PaymentTypes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class paymentTypesController extends BaseController
{
    public function list(Request $request){
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $PaymentTypes = PaymentTypes::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $PaymentTypes->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $PaymentTypes = $PaymentTypes->paginate($limit);

            return ['message' => 'Show payment types list data successfully' ,'data' => $PaymentTypes];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function create(Request $request){
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $paymentTypes = new PaymentTypes();
            $admin_id = Auth::guard('admins')->id();
            $paymentTypes->name = $request->name;
            $paymentTypes->admin_id = $admin_id;
            $paymentTypes->save();
            return ['message' => 'Payment types has been saved successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function single(Request $request){
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
            $paymentTypes = PaymentTypes::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($paymentTypes == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $paymentTypes];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function update(Request $request){
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                    'name' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $paymentTypes = PaymentTypes::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($paymentTypes == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            $paymentTypes->name = $request->name;
            $paymentTypes->save();
            return ['message' => 'Payment types has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public function delete(Request $request){
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
            PaymentTypes::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Payment types has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
