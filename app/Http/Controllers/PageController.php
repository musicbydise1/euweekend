<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function programs()
    {
        return view('programs');
    }

    public function blog()
    {
        return view('blog');
    }

    public function education()
    {
        return view('education');
    }

    public function contact()
    {
        return view('contact');
    }

    public function reviews()
    {
        return view('reviews');
    }
}
