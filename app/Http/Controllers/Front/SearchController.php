<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $keyword=strip_tags($request->search);
        $posts=Post::where("title","like",'%'.$keyword.'%')
        ->orWhere("descr","like",'%'.$keyword.'%')
        ->paginate(9);

        return view('front.search',compact('posts'));


    }
}
