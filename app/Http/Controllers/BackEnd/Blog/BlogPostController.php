<?php

namespace App\Http\Controllers\BackEnd\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreatePostRequest;
use App\Http\Requests\Blog\UpdatePostRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogPostController extends Controller
{

    public function index(Request $request)
    {
        $data_query = BlogPost::with('category','author:id,name');


        if($request->category_id != ""){
            $data_query->where(['category_id'=>$request->category_id]);
        }

        if($request->search != ""){
            $data_query->where('title','like','%'.$request->search.'%');
        }

        $categories = BlogCategory::where(['is_active'=>1])->get();

        $data = $data_query->orderBy('id','desc')->paginate(20);

        return view('backends.blog-posts.index',[
            'datas'=>$data,
            'search'=>$request->search,
            'categories'=>$categories,
            'category_id'=>$request->category_id,
        ]);
    }

    public function create()
    {
        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];


        $categories = BlogCategory::where(['is_active'=>1])->get(['id','title']);

        return view('backends.blog-posts.create',[
            'statusList'=>$statusList,
            'categories'=>$categories,
        ]);
    }

    public function store(CreatePostRequest $request)
    {
        $inputs = $request->only('title','description','category_id','is_active','meta_description','meta_keyword');
        $inputs['author_id'] = auth()->user()->id;
        $inputs['slug'] = strtolower(str_replace(" ",'-',$request->slug));
        $inputs['description'] = $request->blog_description;

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

            BlogPost::create($inputs);
            session()->flash('success','Data saved successfully');
            return redirect()->route('blog-posts.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $data = BlogPost::findOrFail($id);

        $statusList = [
            ['id'=>0,'name'=>'Disable'],
            ['id'=>1,'name'=>'Enable'],
        ];

        $categories = BlogCategory::where(['is_active'=>1])->get(['id','title']);

        return view('backends.blog-posts.edit',[
            'statusList'=>$statusList,
            'data'=>$data,
            'id'=>$id,
            'categories'=>$categories,
        ]);

    }

    public function update(UpdatePostRequest $request,$id)
    {
        $inputs = $request->only('title','category_id','is_active','meta_description','meta_keyword');
        $inputs['author_id'] = auth()->user()->id;
        $inputs['slug'] = strtolower(str_replace(" ",'-',$request->slug));
        $inputs['description'] = $request->blog_description;

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

        try {
            BlogPost::where(['id'=>$id])->update($inputs);
            session()->flash('success','Data updated successfully');
            return redirect()->route('blog-posts.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            BlogPost::where(['id'=>$id])->delete();
            session()->flash('success','Data deleted successfully');
            return redirect()->route('blog-posts.index');
        }catch (\Exception $exception){
            session()->flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

}
