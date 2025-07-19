<?php

namespace App\Http\Controllers\Template\BackTier;

use App\Enum\BatchStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CreateBatchRequest;
use App\Http\Requests\Template\CreateCourseCategoryRequest;
use App\Http\Requests\Template\UpdateBatchRequest;
use App\Http\Requests\Template\UpdateCourseContentRequest;
use App\Models\LMS\Batch;
use App\Models\LMS\BatchTeacher;
use App\Models\LMS\Course;
use App\Models\LMS\CourseCategory;
use App\Models\LMS\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{

    public function index(Request $request)
    {

        $data_query = Batch::with('course','courseCategory','teachers','teachers.teacher');

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        if($request->course_id != ""){
            $data_query->where(['course_id'=>$request->course_id]);
        }

        if($request->course_category_id != ""){
            $data_query->where(['course_category_id'=>$request->course_category_id]);
        }

        $data = $data_query->paginate(20);
        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        $courseCategories = CourseCategory::where(['is_active'=>1])->get(['id','title']);

        return view('template.pages.backends.batches.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'course_category_id'=>$request->course_category_id,
            'course_id'=>$request->course_id,
            'courses'=>$courses,
            'courseCategories'=>$courseCategories,
        ]);

    }

    public function create()
    {

        $batchStatus = BatchStatusEnum::cases();

        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        $teachers = Teacher::where(['is_active'=>1])->get(['id','name']);
        return view('template.pages.backends.batches.create',[
            'batchStatus'=>$batchStatus,
            'courses'=>$courses,
            'teachers'=>$teachers,
        ]);
    }

    public function store(CreateBatchRequest $request)
    {
        $inputs = $request->only('course_id','course_category_id','batch_ID','start_time','first_class','batch_name','duration','schedule','fee','discount','advanced','status');

        try {
            DB::beginTransaction();

            $course = Course::find($request->course_id);
            $inputs['course_category_id'] = $course->course_category_id;
            $batch = Batch::create($inputs);

            foreach ($request->teacher_id as $teacher_id){
                BatchTeacher::create([
                    'batch_id'=>$batch->id,
                    'teacher_id'=>$teacher_id,
                    'course_id'=>$request->course_id,
                ]);
            }
            DB::commit();
            session()->flash('success','Data saved successfully');
            return redirect()->route('admin.batches.index');
        }catch (\Exception $exception){
            DB::rollBack();
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = Batch::findOrFail($id);

        $batchStatus = BatchStatusEnum::cases();

        $courses = Course::where(['is_active'=>1])->get(['id','title']);
        $teachers = Teacher::where(['is_active'=>1])->get(['id','name']);

        $batchTeachersId = BatchTeacher::where(['batch_id'=>$id])->pluck('teacher_id')->toArray();

        return view('template.pages.backends.batches.edit',[
            'data'=>$data,
            'id'=>$id,
            'courses'=>$courses,
            'batchStatus'=>$batchStatus,
            'teachers'=>$teachers,
            'batchTeachersId'=>$batchTeachersId,
        ]);
    }

    public function update(UpdateBatchRequest $request,$id)
    {
        $inputs = $request->only('course_id','course_category_id','batch_ID','start_time','first_class','batch_name','duration','schedule','fee','discount','advanced','status');

        try {
            Batch::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('admin.batches.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            Batch::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('admin.batches.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
