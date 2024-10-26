<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){

        $post->load([
            "images",
            "comments" =>function($query){
                return $query->limit(3);
            }
        ]);
        $realtedPosts=Post::where("catogry_id",$post->catogry_id)->get();
        return view('front.single_post',compact('post','realtedPosts'));
    }


    public function getPostComments(Post $post){
        $comments=$post->comments()->with("user")->get();
// return $comments;
        return response()->json($comments);

    }

    public function storeComments(Request $request){
        $comment=Comment::create([
            "comment" =>$request->comment,
            "post_id" =>$request->post_id,
            "user_id" =>1,
            "ip_address" =>$request->ip_address
        ]);

        if($comment){
            return response()->json([
                "data" =>$comment,
                "msg" =>"comment created successfully",
            ]);
        }

        return response()->json([
            "msg" =>"there is error",
        ]);
    }
}
