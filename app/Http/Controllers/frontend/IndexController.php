<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('frontend/frontendpages/index');
    }

    public function blog(){
        return view('frontend/frontendpages/blog');
    }



    public function about(){
        return view('frontend/frontendpages/about');
    }
    public function contact(){
        return view('frontend/frontendpages/contact');
    }
    public function services(){
        return view('frontend/frontendpages/services');
    }
    
}


