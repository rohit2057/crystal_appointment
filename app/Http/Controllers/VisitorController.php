<?php

namespace App\Http\Controllers;

use App\Models\visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect()->back()->with('success','You have successfully added an Visitor');
     
    }
        
    function visitor_update(Request $request)
    {
	//get product status with the help of product ID
	$data = DB::table('visitors')
				->select('v_status')
				->where('v_id','=',$request->submit)
				->first();

	//Check user status
	if($data->v_status == 'active'){
		$v_status = 'inactive';
	}elseif($data->v_status == 'inactive'){
		$v_status = 'active';
	}

	//update product status
	$values = array('v_status' => $v_status );
	DB::table('visitors')->where('v_id',$request->submit)->update($values);

    return redirect()->back()->with('success','status updated Successfully');

	
    }

    function getVisitorDetail(Request $request)
{
    $visitorDetail = visitor::find($request->v_id);
    $visitorDetail->v_id = $request->v_name;
    $visitorDetail->v_contact = $request->v_contact;
    $visitorDetail->v_email = $request->v_email;

    if($visitorDetail->update()){
        return redirect("/visitor");
    }
    
    return $request->input();
}

  

}