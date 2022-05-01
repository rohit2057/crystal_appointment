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
     
       $obj->first_name = $request-> first_name;
       $obj->last_name = $request-> last_name;
       $obj->post = $request->post;
       $obj->status = 'active';
       $obj->work_start_time = $request->work_start_time;
       $obj->work_end_time = $request->work_end_time;
       $obj->save();
       return redirect()->back()->with('success','You have successfully added an Officer');
    }

    
function status_update(Request $request)
{
	//get product status with the help of product ID
	$data = DB::table('officers')
				->select('status')
				->where('officer_id','=',$request->submit)
				->first();

	//Check user status
	if($data->status == 'active'){
		$status = 'inactive';
	}elseif($data->status == 'inactive'){
		$status = 'active';
	}

	//update product status
	$values = array('status' => $status );
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
