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

        $query = Program::with('translations');

        // Фильтр по категории
        if ($categorySlug) {
            $cat = ProgramCategory::where('slug', $categorySlug)->first();
            if ($cat) {
                $query->where('program_category_id', $cat->id);
            }
        }

        // Фильтр по дате (предположим, поля start_time/end_time в Program)
        if ($startDate) {
            $query->where('start_time', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('end_time', '<=', $endDate);
        }

        $programs = $query->get();

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
