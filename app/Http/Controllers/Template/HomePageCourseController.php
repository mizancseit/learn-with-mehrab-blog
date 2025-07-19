<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\LMS\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomePageCourseController extends Controller
{

    public function courseList(Request $request)
    {
        $batch_query = Batch::with('course')
            ->where(function ($query){
                $query->where('status','!=',"cancel")
                    ->where('status','!=',"complete");
            });

        if($request->category_id != ""){
            $batch_query->where('course_category_id','=',$request->category_id);
        }

        $batches = $batch_query->get()
            ->map(function ($item){
                return [
                    'id'=>$item->id,
                    'course_name'=>$item->course?->title,
                    'image'=>asset('uploads/lms/courses/'.$item->course?->thumbnail),
                    'fee'=>$item->fee,
                    'discount'=>$item->discount,
                    'link'=>route('course.details',[$item->course?->slug,$item->batch_ID])
                ];
            });

        return response()->json($batches,200);
    }


    public function getCourse(Request $request)
    {

        $batch_query = Batch::with('course','course.level','course.type')
            ->where(function ($query){
                $query->where('status','!=',"cancel")
                    ->where('status','!=',"complete");
            });

        $categoryIds = json_decode($request->category_ids,true);
        $levelIds = json_decode($request->level_ids,true);
        $typeIds = json_decode($request->type_ids,true);


        if(!empty($categoryIds)){
            $batch_query->whereHas('course',function ($query) use($categoryIds){
                $query->whereIn('course_category_id',$categoryIds);
            });
        }

        if(!empty($levelIds)){
            $batch_query->whereHas('course',function ($query) use($levelIds){
                $query->whereIn('course_level_id',$levelIds);
            });
        }

        if(!empty($typeIds)){
            $batch_query->whereHas('course',function ($query) use($typeIds){
                $query->whereIn('course_type_id',$typeIds);
            });
        }

        if($request->search != ""){
            $batch_query->whereHas('course',function ($query) use($request){
                $query->where('title','like','%'.$request->search.'%');
            });
        }


        Log::info($batch_query->toSql());

        $batches = $batch_query->limit($request->limit)
            ->orderBy('id','desc')
            ->get()
            ->map(function ($item){
                return [
                    'id'=>$item->id,
                    'course_name'=>$item->course?->title,
                    'course_level'=>$item->course?->level?->title,
                    'course_type'=>$item->course?->type?->title,
                    'slug'=>$item->course?->slug,
                    'batch_number'=>$item->batch_ID,
                    'image'=>asset('uploads/lms/courses/'.$item->course?->thumbnail),
                    'fee'=>$item->fee,
                    'discount'=>$item->discount,
                    'link'=>route('course.details',[$item->course?->slug,$item->batch_ID])
                ];
            });

        return response()->json($batches,200);
    }


}
