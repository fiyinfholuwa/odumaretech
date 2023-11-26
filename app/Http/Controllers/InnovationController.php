<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Innovation;
use App\Models\Blog;

class InnovationController extends Controller
{
    public function innovation(){
        $innovations = Innovation::paginate(6);
        return view('frontend.innovation', compact('innovations'));
    }

    public function blog(){
        $posts = Blog::paginate(6);
        return view('frontend.blog', compact('posts'));
    }
}
