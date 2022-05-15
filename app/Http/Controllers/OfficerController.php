<?php

namespace App\Http\Controllers;

use App\Models\officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\workingdays;

class OfficerController extends Controller
{
    function index(){
        $data= officer::paginate(10);
        return view('officer',['value'=>$data]);
    }

    function officerAdd(Request $request){
     
        $obj= new officer();
       $id = rand(time(), 10000); 
       
       $obj->officer_id = $id;
       $obj->first_name = $request-> first_name;
       $obj->last_name = $request-> last_name;
       $obj->post = $request->post;
       $obj->officer_status = 'active';
       $obj->work_start_time = $request->work_start_time;
       $obj->work_end_time = $request->work_end_time;
       $obj->save();

       foreach($request->days as $key=>$name)
       {
           $obj1 = new workingdays();
           $obj1->officer_id = $id;
           $obj1->days_of_week = $name;
           $obj1->save();
       }
    
       return redirect()->back()->with('success','You have successfully added an Officer');
    }

    
function status_update(Request $request)
{
	//get product status with the help of product ID
	$data = DB::table('officers')
				->select('officer_status')
				->where('officer_id','=',$request->submit)
				->first();

	//Check user status
	if($data->officer_status == 'active'){
		$status = 'inactive';
	}elseif($data->officer_status == 'inactive'){
		$status = 'active';
	}

	//update product status
	$values = array('officer_status' => $status );
	DB::table('officers')->where('officer_id',$request->submit)->update($values);

    return redirect()->back()->with('success','status updated Successfully');

	
}  

function getOfficerDetail(Request $request)
{
    $officerDetail = officer::find($request->officer_id);
    $officerDetail->first_name = $request->new_first_name;
    $officerDetail->last_name = $request->new_last_name;
    $officerDetail->work_start_time = $request->new_work_start_time;
    $officerDetail->work_end_time = $request->new_work_end_time;
    $officerDetail->post = $request->new_post;
    if($officerDetail->update()){
        return redirect()->back()->with('success','Officer updated Successfully');
    }
    
    return $request->input();
}


}
