<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\skill;
use App\Models\capability;
use Illuminate\Support\Facades\Validator;

class coursecontroller extends Controller
{
    public function course(request $request)
    {
        $validator = Validator::make($request->all(), [
            'courseName' => 'required',
            'courseImage' => 'required',
        ]);

        if ($validator->fails()) {
            return "error found";
        }
        $course = new course;
        $course->courseName = $request->courseName;
        $course->courseimage = $request->courseImage;
        $course->save();
        return response()->json(["data" => "created successfully"]);
    }

    public function create(request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'capability.*.capabilityName' => 'required',
            'capability.*.skill.*.skillName' => 'required',
        ]);

        if ($validator->fails()) {
            return "error found";
        }

        $course = course::find('6390e605cbf9072f720c9f22');
        $course->capability()->create([
            'capabilityName' =>  $request->capability[0]['capabilityName']
        ]);
        $course->skill()->create([
            'skillName' =>  $request->capability[0]['skill'][0]['skillName']
        ]);
        return response()->json(["data" => "created successfully"]);
    }



    public function getdata(request $request)
    {
        // dd($request->all());
        // $course = course::find('6390e605cbf9072f720c9f22');
        $data = course::with('capability','skill')->get();
        $query = course::query();
        $perpage = 10;
        $page = $request->input(key: 'page', default: 1);
        $total = $query->count();
        // $result = $query->offset(value: ($page - 1) * $perpage)->limit($perpage)->get();

        return response()->json(["statuscode" => 200,  "data"=>$data, "total" => $total, "page" => $page, "limit" => $perpage]);
    }

    public function update(request $request, $id)
    {
        // dd($id);
        $validator = Validator::make($request->all(), [
            'courseName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'courseImage' => 'required',
            'capability.*.capabilityName' => 'required',
            'capability.*.skill.*.skillName' => 'required',
        ]);

        if ($validator->fails()) {
            return "error found";
        }

        $course = course::findOrFail($id);
        $course->capability()->update([
            'capabilityName' =>  $request->capability[0]['capabilityName']
        ]);
        $course->skill()->update([
            'skillName' =>  $request->capability[0]['skill'][0]['skillName']
        ]);
        return response()->json(["data" => "Updated Successfully"]);
    }

    public function delete(request $request, $id)
    {
        // dd($id);
        $data = course::findOrFail($id);
        $data->skill()->delete();
        $data->capability()->delete();
        $data->delete();
        return response()->json(["data" => "Deleted"]);
    }
}
