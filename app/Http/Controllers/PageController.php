<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }

    public function terms(){
        return view('pages.terms');
    }
    public function cancellation(){
        return view('pages.cancellation');
    }
    public function shipping(){
        return view('pages.shipping');
    }
    public function privacy(){
        return view('pages.privacy');
    }
}
