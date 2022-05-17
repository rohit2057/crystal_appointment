<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use Illuminate\Http\Request;

date_default_timezone_set("Asia/Katmandu");
class ActivityController extends Controller
  {
    function activity()
    {

        $data['a'] = Activity::leftjoin('officers','activities.o_id','=','officer_id')
        ->leftjoin('visitors','activities.visitor_id','=','v_id')
        ->get()->all(); 

        $data['b'] = DB::table('officers')->get()->all();

        $data['c'] = DB::table('visitors')->get()->all();

        return view('activity',['value'=>$data]);

        
        
    }


//    function addActivity(Request $request){

//    }

   function activity_update(Request $req)
    {
        if($req->status_value == 'active')
        {
            DB::table('activities')->where('activity_id',$req->activity_id)->update(array('status'=> 'inactive'));
        }else
        {
            $statusOfficer = (object)DB::table('officers')->select('officer_status')->where('officer_id',$req->officer_id)->get();
            $statusVisitor = (object)DB::table('visitors')->select('v_status')->where('v_id',$req->visitor_id)->get();

            foreach($statusOfficer as $stat){
                if($stat->officer_status == 'active'){
                    $officerStatus = 'active';
                }
                else{
                    $officerStatus = 'inactive';
                }
            }

            $visitorStatus = "empty";
            foreach($statusVisitor as $stat){
                if($stat->v_status == 'active'){
                    $visitorStatus = 'active';
                }
                else{
                    $visitorStatus = 'inactive';
                }
            }

            if($officerStatus == 'active' && $visitorStatus == 'active' || $officerStatus == 'active' && $visitorStatus == "empty" )
            {
                DB::table('activities')->where('activity_id',$req->activity_id)->update(array('status'=> 'active'));
            }else{
                return redirect()->back()->with('error','Officer Or Visitor Deactivated');
            }
        } 
        return redirect()->back()->with('success','Status changed Successfully');

    }

    function activityAdd(Request $request)
    {
        // return $request;
        $data = activity::get()->all();
        
        $obj = new activity();

        if(count($data) > 0)
        {

            $days = DB::table('workingdays')
                    ->where('officer_id','=',$request->o_id)
                    ->get()
                    ->all();

            $requestedDay = strtolower(date("l", strtotime($request->date)));

            $isInWorkingdays = false;
            
            foreach ($days as $column => $value)
            {
                if($requestedDay == $value->days_of_week){
                   $isInWorkingdays = true;
                   break;
                }
            }

            $officeTime = DB::table('officers')
                        ->where('officer_id','=',$request->o_id)
                        ->get()
                        ->all();
        
            foreach ($officeTime as $column => $value)
            {
                $officerWorkStartTime = $value->work_start_time ;
                $officerWorkEndTime = $value->work_end_time;
            }

            foreach ($data as $column => $value)
            {
                $o_id = $value->o_id;
                $visitorid = $value->visitor_id;
                $type = $value->type;
                $status = $value->status;
                $date = $value->date;
                $starttime = $value->start_time;
                $endtime = $value->end_time;
            
            if($isInWorkingdays)
            {
                if($request->start_time >= $officerWorkStartTime && $request->end_time <= $officerWorkEndTime)
                {
                    if($request->date == $date)
                    {
                        if( $request->o_id == $o_id || $request->visitor_id == $visitorid)
                        {
                            if($status != "cancelled")
                            {
                                if(((strtotime("$request->start_time") < strtotime("$starttime") && strtotime("$request->end_time") < strtotime("$starttime")) || (strtotime("$request->start_time") > strtotime("$endtime") && strtotime("$request->end_time") > strtotime("$endtime"))) && (strtotime("$request->start_time") < strtotime("$request->end_time")))
                                {
                                    $obj->o_id = $request->o_id;
                                    $obj->visitor_id = $request->visitor_id;
                                    $obj->name = $request->name;
                                    $obj->type = $request->type;
                                    $obj->status = 'active';
                                    $obj->date = $request->date;
                                    $obj->start_time = $request->start_time;
                                    $obj->end_time = $request->end_time;
                                    $obj->added_on = date("Y-m-d h:i:s",time());

                                    $obj->save();

                                    return redirect()->back()->with('success','You have successfully added an Activity');

                                }else{
                                    return redirect()->back()->with('error','Officer or Visitor already has Appointment or Officer is on Break or Leave.');
                                }

                            }else{
                                    $obj->o_id = $request->o_id;
                                    $obj->visitor_id = $request->visitor_id;
                                    $obj->name = $request->name;
                                    $obj->type = $request->type;
                                    $obj->status = 'active';
                                    $obj->date = $request->date;
                                    $obj->start_time = $request->start_time;
                                    $obj->end_time = $request->end_time;
                                    $obj->added_on = date("Y-m-d h:i:s",time());

                                    $obj->save();

                                    return redirect()->back()->with('success','You have successfully Inserted an Activity');
                            }
                            
                        }else
                        {
                            $obj->o_id = $request->o_id;
                            $obj->visitor_id = $request->visitor_id;
                            $obj->name = $request->name;
                            $obj->type = $request->type;
                            $obj->status = 'active';
                            $obj->date = $request->date;
                            $obj->start_time = $request->start_time;
                            $obj->end_time = $request->end_time;
                            $obj->added_on = date("Y-m-d h:i:s",time());

                            $obj->save();

                            return redirect()->back()->with('success','You have successfully Inserted an Activity');
                        }
                    }else
                    {
                        $obj->o_id = $request->o_id;
                        $obj->visitor_id = $request->visitor_id;
                        $obj->name = $request->name;
                        $obj->type = $request->type;
                        $obj->status = 'active';
                        $obj->date = $request->date;
                        $obj->start_time = $request->start_time;
                        $obj->end_time = $request->end_time;
                        $obj->added_on = date("Y-m-d h:i:s",time());

                        $obj->save();

                        return redirect()->back()->with('success','You have successfully Inserted an Activity');
                    }

                }else
                {
                    return redirect()->back()->with('error',' Officer has no working hour in given time.');
                }
            }else
            {
                return redirect()->back()->with('error',' Officer is not availabe.');
            }
        }
        }else
        {
            $obj->o_id = $request->o_id;
            $obj->visitor_id = $request->visitor_id;
            $obj->name = $request->name;
            $obj->type = $request->type;
            $obj->status = 'active';
            $obj->date = $request->date;
            $obj->start_time = $request->start_time;
            $obj->end_time = $request->end_time;
            $obj->added_on = date("Y-m-d h:i:s",time());

            $obj->save();

            return redirect()->back()->with('success','You have successfully Inserted an Activity');
        }
    
    
    }

    
    function updateActivity(Request $request)
    {
        $data = DB::table('activities')->where('activity_id','!=',$request->new_activity_id)->get()->all();
        
        //$obj = Activity::findOrFail($request->newactivity_id);
        $obj = DB::table('activities')->where('activity_id',$request->new_activity_id)->get();


        $days = DB::table('workingdays')
        ->where('officer_id','=',$request->new_o_id)
        ->get()
        ->all();

        $requestedDay = strtolower(date("l", strtotime($request->new_date)));

        $isInWorkDay = false;

        foreach ($days as $column => $value)
        {
            if($requestedDay == $value->days_of_week){
            $isInWorkDay = true;
            break;
            }
        }

        $officeTime = DB::table('officers')
                    ->where('officer_id','=',$request->new_o_id)
                    ->get()
                    ->all();

        foreach ($officeTime as $column => $value)
        {
            $officerWorkStartTime = $value->work_start_time ;
            $officerWorkEndTime = $value->work_end_time;
        }


        foreach ($data as $column => $value)
        {
            $o_id = $value->o_id;
            $visitorid = $value->visitor_id;
            $date = $value->date;
            $starttime = $value->start_time;
            $endtime = $value->end_time;
        }

        if($isInWorkDay)
        {
            if($request->new_start_time >= $officerWorkStartTime && $request-> new_end_time <= $officerWorkEndTime)
            {
                
                if($request->new_date == $date)
                {
                    
                    if($request->new_visitor_id == $visitorid || $request->new_o_id == $o_id)
                    {
                        if(((strtotime("$request->new_start_time") < strtotime("$starttime") && strtotime("$request->new_end_time") < strtotime("$starttime")) || (strtotime("$request->new_start_time") > strtotime("$endtime") && strtotime("$request->new_end_time") > strtotime("$endtime"))) && (strtotime("$request->new_start_time") < strtotime("$request->new_end_time")))
                        {
                            $updatedData = array(
                                "o_id" => $request->new_o_id,
                                "visitor_id" => $request->new_visitor_id,
                                "name" => $request->new_name,
                                "date" => $request->new_date,
                                "start_time" => $request->new_start_time,
                                "end_time" => $request->new_end_time,
                                "added_on" => date("Y-m-d h:i:s",time()),
                            );
                            
                            DB::table('activities')->where('activity_id',$request->new_activity_id)->update($updatedData);

                            return redirect()->back()->with('success','You have successfully Updated an Activity');
                        }else{
                            return redirect()->back()->with('error','Officer or Visitor already has Appointment or Officer is on Break or Leave.');
                        }

                    }else
                    {
                        $updatedData = array(
                            "o_id" => $request->new_o_id,
                            "visitor_id" => $request->new_visitor_id,
                            "name" => $request->new_name,
                            "date" => $request->new_date,
                            "start_time" => $request->new_start_time,
                            "end_time" => $request->new_end_time,
                            "added_on" => date("Y-m-d h:i:s",time()),
                        );
                        
                            DB::table('activities')->where('activity_id',$request->new_activity_id)->update($updatedData);

                            return redirect()->back()->with('success','You have successfully Inserted an Activity');
                    }
                }else
                {
                    $updatedData = array(
                        "o_id" => $request->new_o_id,
                        "visitor_id" => $request->new_visitor_id,
                        "name" => $request->new_name,
                        "date" => $request->new_date,
                        "start_time" => $request->new_start_time,
                        "end_time" => $request->new_end_time,
                        "added_on" => date("Y-m-d h:i:s",time()),
                    );
                    
                    DB::table('activities')->where('activity_id',$request->new_activity_id)->update($updatedData);


                    return redirect()->back()->with('success','You have successfully Inserted an Activity');
                }

            }else
            {
                return redirect()->back()->with('error',' Officer has no working hour in given time.');
            }
        }else
        {
            return redirect()->back()->with('error',' Officer is not availabe.');
        }
    }

    function cancelActivity(Request $req)
    {
        DB::table('activities')->where('activity_id',$req->activity_id)->update(array('status'=> 'cancelled'));
        return redirect()->back()->with('success','Activity Cancelled Successfully');
    }


    function getActivityDetail($id)
    {
        // $activity = Activity::find($id);
        $activity = DB::table('activities')->where('activity_id',$id)->get()->all();
        foreach ($activity as $column => $value)
            {
                $officerid = $value->o_id ;
                $visitorid = $value->visitor_id;
            }
        $officername = DB::table('officers')->select('first_name','last_name')->where('officer_id',$officerid)->get();
        $visitorname = DB::table('visitors')->select('v_name')->where('v_id',$visitorid)->get();

        return response()->json([
            'status' => 200,
            'activity' => $activity,
            'officername' => $officername,
            'visitorname' => $visitorname,
        ]);
    }


        function searchResult(Request $request)
        {
            
            if($request->key == 'officer')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitor.id')
                ->where('first_name','like','%'.$request->searchData.'%')
                ->orWhere('last_name','like','%'.$request->searchData.'%')
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }
            elseif($request->key == 'visitor')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitor.id')
                ->where('v_name','like','%'.$request->searchData.'%')
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }
            elseif($request->key == 'type')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitor.id')
                ->where($request->key,'like','%'.$request->searchData.'%')
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }elseif( $request->key == 'status')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitor.id')
                ->where($request->key,'like',$request->searchData.'%')
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }elseif($request->key == 'date')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitor.id')
                ->whereDate('date', '>=',$request->fromdate)
                ->whereDate('date', '<=',$request->todate)
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }elseif($request->key == 'time')
            {
                $res = DB::table('activities')
                ->leftjoin('officers','activities.o_id', '=', 'o.id')
                ->leftJoin('visitors','activities.visitor_id','=','visitors.id')
                ->whereTime('start_time', '>',$request->fromtime,)
                ->whereTime('start_time', '<',$request->totime,)
                ->orderBy('date', 'DESC')
                ->get();

                return $res;
            }
        }


}