<?php

namespace App\Http\Controllers\BackEnd\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateCategoryRequest;
use App\Http\Requests\Blog\UpdateCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function index(Request $request)
    {
        $data_query = BlogCategory::query();

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }
        $data = $data_query->paginate(20);

        return view('backends.blog-categories.index',[
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
        return view('backends.blog-categories.create',[
            'statusList'=>$statusList
        ]);
    }

    public function store(CreateCategoryRequest $request)
    {
        $inputs = $request->only('title','slug','is_active','comments');
        try {
            BlogCategory::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('blog-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = BlogCategory::findOrFail($id);
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];
        return view('backends.blog-categories.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id
        ]);
    }

    public function update(UpdateCategoryRequest $request,$id)
    {
        $inputs = $request->only('title','slug','is_active','comments');

        try {
            BlogCategory::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('blog-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            BlogCategory::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('blog-categories.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
