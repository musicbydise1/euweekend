<?php

namespace App\Http\Controllers;

use App\Models\Article; // Модель статьи блога
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($slug)
    {
        // Ищем статью по slug
        $article = Article::where('slug', $slug)->firstOrFail();

        // Возвращаем представление с деталями статьи
        return view('blog.show', compact('article'));
    }
}
