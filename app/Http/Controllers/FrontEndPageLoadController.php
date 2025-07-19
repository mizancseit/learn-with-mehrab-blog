<?php

namespace App\Http\Controllers;

use App\Models\Collections\Pages;

class FrontEndPageLoadController extends Controller
{
    public function __invoke($route,$pram = null){

        $page = Pages::where(['slug'=>$route])->firstOrFail();

        if($page->type == 'static'){
            return view('frontends.static',[
                'page'=>$page
            ]);
        }

        if($page->type == 'team'){
            return view('frontends.team',[
                'page'=>$page
            ]);
        }

        if($page->type == 'blog'){
            return view('frontends.blog',[
                'page'=>$page
            ]);
        }

        if($page->type == 'service'){
            return view('frontends.service',[
                'page'=>$page
            ]);
        }

    }

}
