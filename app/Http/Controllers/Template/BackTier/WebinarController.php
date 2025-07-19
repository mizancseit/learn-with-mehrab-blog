<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\Webinar\CreateWebinarRequest;
use App\Http\Requests\Template\Webinar\UpdateWebinarRequest;
use App\Models\LMS\Course;
use App\Models\LMS\Webinar;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class WebinarController extends Controller
{

    public function index(Request $request)
    {
        $data_query = Webinar::with('course');

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        $courses = Course::where(['is_active'=>1])->get();

        $data = $data_query->orderBy('id','desc')->paginate(20);

        return view('template.pages.backends.webinar.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'courses'=>$courses,
            'course_id'=>$request->course_id,
        ]);
    }

    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $courses = Course::where(['is_active'=>1])->get(['id','title']);

        return view('template.pages.backends.webinar.create',[
            'statusList'=>$statusList,
            'courses'=>$courses,
        ]);
    }

    public function store(CreateWebinarRequest $request)
    {
        $inputs = $request->only('course_id','date','title','thumbnail','duration','short_description',"medium",'what_is_learn','why_need_this_course','is_active','meta_keyword','meta_description');

        try {

            if($request->hasFile('thumbnail')){
                $manager = new ImageManager(new Driver());

                $image = $request->file('thumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('uploads/lms/webinars/'.$imageName);

                $manager->read($image)->resize(600, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);

                $inputs['thumbnail'] = $imageName;
            }

            Webinar::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.webinars.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = Webinar::findOrFail($id);

        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $courses = Course::where(['is_active'=>1])->get(['id','title']);

        return view('template.pages.backends.webinar.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id,
            'courses'=>$courses,
        ]);
    }



    public function update(UpdateWebinarRequest $request,$id)
    {

        $inputs = $request->only('course_id','date','title','thumbnail','duration','short_description',"medium",'what_is_learn','why_need_this_course','is_active','meta_keyword','meta_description');

        if($request->hasFile('thumbnail')){
            $manager = new ImageManager(new Driver());

            $image = $request->file('thumbnail');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/lms/webinars/'.$imageName);

            $manager->read($image)->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $inputs['thumbnail'] = $imageName;
        }

        try {
            Webinar::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.webinars.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function destroy($id)
    {
        try {
            Webinar::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.webinars.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



}
