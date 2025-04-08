<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\ProgramTranslation;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        // Можно подгружать категорию
        $programs = Program::with('category')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        // Для выбора категории
        $categories = ProgramCategory::all();
        return view('admin.programs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // 1. Создаём программу (пока без image)
        $program = new Program([
            'slug' => $request->input('slug'),
            'program_category_id' => $request->input('program_category_id'),
            'is_premium' => $request->boolean('is_premium'),
            'price' => $request->input('price'),
            'days' => $request->input('days'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'duration_hours' => $request->input('duration_hours'),
            'stock' => $request->input('stock'),
             'image' => $request->input('image'), // пока не ставим
        ]);
        $program->save();

        // 2. Проверяем, загружен ли файл
        if ($request->hasFile('image_file')) {
            // Сохраняем файл (например, в storage/app/public/programs)
            $path = $request->file('image_file')->store('public/programs');
            // Преобразуем путь, чтобы при выводе использовать /storage/...
            $relativePath = str_replace('public/', '/storage/', $path);

            // Ставим image = /storage/programs/filename.jpg
            $program->image = $relativePath;
        } else {
            // Если пользователь не загрузил файл, берём текст из поля 'image'
            $program->image = $request->input('image');
        }
        $program->save();

        // 3. Создаём переводы
        $locales = $request->input('locales', []);
        foreach ($locales as $locale) {
            ProgramTranslation::create([
                'program_id' => $program->id,
                'locale' => $locale,
                'title' => $request->input("title.$locale"),
                'description' => $request->input("description.$locale"),
            ]);
        }

        return redirect()->route('programs.index')
            ->with('success', 'Программа успешно создана.');
    }

    public function edit($id)
    {
        $program = Program::with('translations')->findOrFail($id);
        $categories = ProgramCategory::all();
        return view('admin.programs.edit', compact('program', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        // Обновляем основные поля
        $program->slug = $request->input('slug');
        $program->program_category_id = $request->input('program_category_id');
        $program->is_premium = $request->boolean('is_premium');
        $program->price = $request->input('price');
        $program->days = $request->input('days');
        $program->start_time = $request->input('start_time');
        $program->end_time = $request->input('end_time');
        $program->duration_hours = $request->input('duration_hours');
        $program->stock = $request->input('stock');

        // Проверяем файл
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('public/programs');
            $relativePath = str_replace('public/', '/storage/', $path);
            $program->image = $relativePath;
        } else {
            // Если не загружали новый файл, используем поле image (URL/path)
            $program->image = $request->input('image');
        }
        $program->save();

        // Обновляем переводы
        $locales = $request->input('locales', []);
        foreach ($locales as $locale) {
            $translation = ProgramTranslation::firstOrNew([
                'program_id' => $program->id,
                'locale' => $locale,
            ]);
            $translation->title = $request->input("title.$locale");
            $translation->description = $request->input("description.$locale");
            $translation->save();
        }

        return redirect()->route('programs.index')
            ->with('success', 'Программа обновлена.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('programs.index')
            ->with('success', 'Программа удалена.');
    }
}
