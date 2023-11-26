<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherPagesController extends Controller
{
    public function faq(){
        return view('frontend.faq');
    }

    public function policy(){
        return view('frontend.refund');
    }

    public function terms(){
        return view('frontend.terms');
    }
    public function privacy(){
        return view('frontend.privacy');
    }
}
