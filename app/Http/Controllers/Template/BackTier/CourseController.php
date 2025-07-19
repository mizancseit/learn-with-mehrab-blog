<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreatePostRequest;
use App\Http\Requests\Blog\UpdatePostRequest;
use App\Http\Requests\Template\CreateCourseRequest;
use App\Http\Requests\Template\UpdateCourseRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\LMS\Course;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\CourseLevel;
use App\Models\LMS\CourseType;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CourseController extends Controller
{

    public function index(Request $request)
    {

        $data_query = Course::with('category','level','type');

        if($request->category_id != ""){
            $data_query->where(['course_category_id'=>$request->category_id]);
        }

        if($request->level_id != ""){
            $data_query->where(['course_level_id'=>$request->level_id]);
        }

        if($request->type_id != ""){
            $data_query->where(['course_type_id'=>$request->type_id]);
        }

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        $categories = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();

        $data = $data_query->orderBy('id','desc')->paginate(20);

        return view('template.pages.backends.courses.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'categories'=>$categories,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes,
            'category_id'=>$request->category_id,
            'level_id'=>$request->level_id,
            'type_id'=>$request->type_id,
        ]);
    }

    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $categories = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();


        $courseType = [
            ['id'=>'live','name'=>'live'],
            ['id'=>'video','name'=>'video'],
        ];


        return view('template.pages.backends.courses.create',[
            'statusList'=>$statusList,
            'categories'=>$categories,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes,
            'contentTypes'=>$courseType,
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        $inputs = $request->only("course_category_id","course_level_id","course_type_id","title","objective","benefits","types","short_description","long_description","status","meta_title","meta_description","meta_keywords","is_active");

        $inputs['created_by'] = auth()->user()->id;
        $inputs['slug'] = strtolower(str_replace(" ",'-',$request->title));
        $inputs['course_ID'] = uniqid();

        try {

            if($request->hasFile('thumbnail')){
                $manager = new ImageManager(new Driver());
                $image = $request->file('thumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('uploads/lms/courses/'.$imageName);
                $manager->read($image)->resize(600, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $inputs['thumbnail'] = $imageName;
            }

            Course::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.courses.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = Course::findOrFail($id);

        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $categories = CourseCategory::where(['is_active'=>1])->get();
        $courseLevels = CourseLevel::where(['is_active'=>1])->get();
        $courseTypes = CourseType::where(['is_active'=>1])->get();

        $courseType = [
            ['id'=>'live','name'=>'live'],
            ['id'=>'video','name'=>'video'],
        ];

        return view('template.pages.backends.courses.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id,
            'categories'=>$categories,
            'courseLevels'=>$courseLevels,
            'courseTypes'=>$courseTypes,
            'contentTypes'=>$courseType,
        ]);

    }

    public function update(UpdateCourseRequest $request,$id)
    {
        $inputs = $request->only("course_category_id","course_level_id","course_type_id","title","objective","benefits","types","short_description","long_description","status","meta_title","meta_description","meta_keywords","is_active");

        $inputs['created_by'] = auth()->user()->id;
        $inputs['slug'] = strtolower(str_replace(" ",'-',$request->title));
        $inputs['course_ID'] = uniqid();

        try {

            if($request->hasFile('thumbnail')){
                $manager = new ImageManager(new Driver());
                $image = $request->file('thumbnail');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $location = public_path('uploads/blogs/'.$imageName);

                $manager->read($image)->resize(600, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $inputs['thumbnail'] = $imageName;
            }

            Course::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.courses.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Course::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.courses.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


}
