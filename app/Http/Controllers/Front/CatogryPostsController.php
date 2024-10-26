<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Catogry;
use Illuminate\Http\Request;

class CatogryPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug)
    {

        $catogry = Catogry::with('posts')->whereSlug($slug)->first();
        $posts=$catogry->posts()->get();

        return view('front.catogry_posts',compact('posts'));

    }
}
