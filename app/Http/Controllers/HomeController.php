<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::with('translations')->get();
        $reviews = Review::with('translations')->get();
        return view('home', compact('programs', 'reviews'));

    }
}
