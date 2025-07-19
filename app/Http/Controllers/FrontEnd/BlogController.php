<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{

    public function index()
    {

        $posts = BlogPost::with('author','category')->where(['is_active'=>1])
            ->orderBy('id','desc')
            ->paginate(2);

        return view('frontends.blog',[
            'posts'=>$posts
        ]);
    }



    public function show($slug)
    {
        $post = BlogPost::with('author','category')
            ->where(['is_active'=>1,'slug'=>$slug])
            ->firstOrFail();

        return view('frontends.blog-details',[
            'post'=>$post
        ]);

    }

}
