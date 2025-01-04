<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Catogry;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
        $posts=Post::with("images")->latest()->paginate(9);
        $mostReadPost=Post::with('images')->take(3)->get();
        $oldestPost=Post::with('images')->oldest()->take(3)->get();
        $popularPost=Post::withCount('comments')
        ->orderBy("comments_count","desc")->take(3)->get();
        // dd($popularPost);
        // dd( $mostReadPost);

        $catogries=Catogry::all()->map(function($catogry){
            $catogry->posts=$catogry->posts()->limit(4)->get();
            return $catogry;

        });

        return view('front.index',
        compact("posts","mostReadPost","oldestPost","popularPost","catogries"));
    }
}
