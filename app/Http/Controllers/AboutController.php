<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function about(){
        $testimonials = Testimonial::all();
        return view('frontend.about', compact('testimonials'));
    }
}
