<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
  {
    function activity(){

        $data['a'] = Activity::leftjoin('officers','activities.o_id','=','officer_id')
        ->leftjoin('visitors','activities.visitor_id','=','v_id')
        ->get()->all(); 

        $data['b'] = DB::table('officers')->get()->all();

        $data['c'] = DB::table('visitors')->get()->all();

        return view('activity',['value'=>$data]);

        
        
    }
}

//    function addActivity(Request $request){

//    }

   function activity_update(Request $request)
   {
   //get product status with the help of product ID
   $data = DB::table('activities')
               ->select('status')
               ->where('activity_id','=',$request->status_value)
               ->first();

   //Check user status
   if($data->status == 'active'){
       $status = 'inactive';
   }elseif($data->v_status == 'inactive'){
       $status = 'active';
   }

   function activityAdd(Request $request){
    return $request;
 
    }

}
