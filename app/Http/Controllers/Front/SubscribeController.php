<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SubscribeMail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SubscribeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "email" =>"required"
        ]);

        $subscripe=Subscribe::create($request->all());
        if($subscripe){
            // flash()->success('Your suscribed successfully.');
            Session::flash("success","Your suscribed successfully.");

            Mail::to($request->email)->send(new SubscribeMail());
        }



        return redirect()->back();


    }
}
