<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    public function create(){
        return view('front.contact');
    }

    public function store(ContactUsRequest $request){

ContactUs::create($request->validated());

Session::flash("success","Your contact added successfully.");

return redirect()->back();

    }
}
