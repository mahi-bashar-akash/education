<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentStatusController extends BaseController
{
    public function list(Request $request){
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $PaymentStatus = PaymentStatus::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $PaymentStatus->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $PaymentStatus = $PaymentStatus->paginate($limit);

            return ['message' => 'Show payment status list data successfully' ,'data' => $PaymentStatus];
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
            $paymentStatus = new PaymentStatus();
            $admin_id = Auth::guard('admins')->id();
            $paymentStatus->name = $request->name;
            $paymentStatus->admin_id = $admin_id;
            $paymentStatus->save();
            return ['message' => 'Payment status has been saved successfully.'];
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
            $paymentStatus = PaymentStatus::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($paymentStatus == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            return ['message' => 'Show single data successfully','data' => $paymentStatus];
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
            $paymentStatus = PaymentStatus::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($paymentStatus == null){
                return ['status' => 500, 'errors' => 'Fees types data not found'];
            }
            $paymentStatus->name = $request->name;
            $paymentStatus->save();
            return ['message' => 'Payment status has been updated successfully.'];
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
            PaymentStatus::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Payment status has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
