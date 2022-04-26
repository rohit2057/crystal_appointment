<?php

namespace App\Http\Controllers;

use App\Models\officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    function index(){
        $data= officer::paginate(10);
        return view('officer',['value'=>$data]);
    }

    function officerAdd(Request $request){
       $obj= new officer();
     
       $obj->first_name = $request-> first_name;
       $obj->last_name = $request-> last_name;
       $obj->post = $request->post;
       $obj->status = 'active';
       $obj->work_start_time = $request->work_start_time;
       $obj->work_end_time = $request->work_end_time;
       $obj->save();

    }


}
