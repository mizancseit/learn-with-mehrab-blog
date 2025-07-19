<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {

        $activity = Activity::with('subject:id,name,code','causer:id,name,code')->orderBy('id','desc')->paginate(50);

        return view('activity-log',[
            'activity_logs'=>$activity
        ]);
    }


    public function details($id)
    {
        $activity = Activity::find($id);
        return view('activity-log-details',[
            'activity_log'=>$activity
        ]);
    }

}
