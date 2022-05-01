<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;


use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function activity(){
        return view('activity');
        
    }

    // function getActivitiesDetails()
    // {
    //     $activity['a'] = Activity::leftjoin('officers','activities.officer_id','=','officer.id')
    //     ->leftjoin('visitors','activities.visitor_id','=','v.id')
    //     ->get()->all(); 

    //     $activity['b'] = DB::table('officers')->get()->all();

    //     $activity['c'] = DB::table('visitors')->get()->all();

    //     return view('activity',['value'=>$activity]);

    // }

}
