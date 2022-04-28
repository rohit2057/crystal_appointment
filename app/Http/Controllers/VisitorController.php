<?php

namespace App\Http\Controllers;

use App\Models\visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    function visit(){
        $data= visitor::paginate(10);
        return view('visitor',['value'=>$data]);
    }

    
    function visitorAdd(Request $request){
        $obj= new visitor();
      
        $obj->v_id = $request->v_id;
        $obj->v_name = $request->v_name;
        $obj->v_contact = $request->v_contact;
        $obj->v_status = 'active';
        $obj->v_email = $request->v_email;
        $obj->save();

        
     
    }

  

}