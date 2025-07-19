<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CreateCourseCategoryRequest;
use App\Http\Requests\Template\UpdateCourseContentRequest;
use App\Models\LMS\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data_query = CourseCategory::query();

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        $data = $data_query->paginate(20);

        return view('template.pages.backends.course-categories.index',[
            'datas'=>$data,
            'search'=>$request->search
        ]);
    }

    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('template.pages.backends.course-categories.create',[
            'statusList'=>$statusList
        ]);
    }

    public function store(CreateCourseCategoryRequest $request)
    {
        $inputs = $request->only('title','is_active','comments','icon');
        $inputs['slug'] = strtolower(str_replace(" ","-",$request->title));

        try {
            CourseCategory::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.course-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = CourseCategory::findOrFail($id);
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('template.pages.backends.course-categories.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id
        ]);
    }

    public function update(UpdateCourseContentRequest $request,$id)
    {
        $inputs = $request->only('title','is_active','comments','icon');
        $inputs['slug'] = strtolower(str_replace(" ","-",$request->title));

        try {
            CourseCategory::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.course-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            CourseCategory::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.course-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }
}
