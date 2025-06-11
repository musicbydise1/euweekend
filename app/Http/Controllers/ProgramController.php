<?php

namespace App\Http\Controllers;

use App\Models\Program; // Модель программы
use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Список программ
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $categorySlug = $request->input('category');

        $programs = Program::with('translations')
            ->filter([
                'category' => $categorySlug,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ])
            ->get();

        // Получаем все категории, чтобы вывести фильтры
        $categories = ProgramCategory::all();

        return view('public.programs.index', compact('programs', 'categories', 'categorySlug', 'startDate', 'endDate'));
    }

    // Детальная страница программы
    public function show($slug)
    {
        // Ищем программу по slug
        $program = Program::with('translations')
            ->where('slug', $slug)
            ->firstOrFail();

        // Возвращаем шаблон, передаём одну программу
        return view('public.programs.show', compact('program'));
    }
}
