<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends BaseController
{
    public static function list (Request $request)
    {
        try {
            $admin_id = Auth::guard('admins')->id();
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $event = Event::where('admin_id', $admin_id)->orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $event->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('guest', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('location', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $event = $event->paginate($limit);

            return ['message' => 'Show event list data successfully' ,'data' => $event];
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
                    'date' => 'required|string',
                    'start_time' => 'required|string',
                    'end_time' => 'required|string',
                    'description' => 'required|string',
                    'guest' => 'required|string',
                    'location' => 'required|string',
                    'avatar' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $event = new Event();
            $admin_id = Auth::guard('admins')->id();
            $event->avatar = $request->avatar;
            $event->name = $request->name;
            $event->date = $request->date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->description = $request->description;
            $event->guest = $request->guest;
            $event->location = $request->location;
            $event->admin_id = $admin_id;
            $event->save();
            return ['message' => 'Event has been saved successfully.'];
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
            $department = Event::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($department == null){
                return ['status' => 500, 'errors' => 'Event not found'];
            }
            return ['message' => 'Show single data successfully','data' => $department];
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
                    'date' => 'required|string',
                    'start_time' => 'required|string',
                    'end_time' => 'required|string',
                    'description' => 'required|string',
                    'guest' => 'required|string',
                    'location' => 'required|string',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $admin_id = Auth::guard('admins')->id();
            $event = Event::where('id', $request->id)->where('admin_id', $admin_id)->first();
            if($event == null){
                return ['status' => 500, 'errors' => 'Event not found'];
            }
            $event->avatar = $request->avatar ?? null;
            $event->name = $request->name;
            $event->date = $request->date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->description = $request->description;
            $event->guest = $request->guest;
            $event->location = $request->location;
            $event->save();
            return ['message' => 'Event has been updated successfully.'];
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
            Event::whereIn('id', $request->ids)->where('admin_id', $admin_id)->delete();
            return ['message' => 'Event has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function eventList(Request $request)
    {
        try {
            $limit = $request->limit ?? 10;
            $keyword = $request->keyword ?? '';
            $events = Event::orderby('id', 'asc');

            if (isset($keyword) && !empty($keyword)) {
                $events->where(
                    function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('guest', 'LIKE', '%' . $keyword . '%');
                        $q->orWhere('location', 'LIKE', '%' . $keyword . '%');
                    }
                );
            }
            $events = $events->paginate($limit);

            return ['message' => 'Show all data list successfully.' ,'data' => $events];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function eventDetails(Request $request) {
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
            $event = Event::where('id', $request->id)->first();
            if($event == null){
                return ['status' => 500, 'errors' => 'Event details data not found.'];
            }
            return ['message' => 'Show single data successfully','data' => $event];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
