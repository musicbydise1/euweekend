<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use App\Models\ProgramCategoryTranslation;
use Illuminate\Http\Request;

class ProgramCategoryController extends Controller
{
    public function index()
    {
        // Список категорий
        $categories = ProgramCategory::with('translations')->get();
        return view('admin.program_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.program_categories.create');
    }

    public function store(Request $request)
    {
        // 1. Создаём саму категорию (slug и т.д.)
        $category = ProgramCategory::create([
            'slug' => $request->input('slug'),
        ]);

        // 2. Создаём переводы (для каждой локали)
        $locales = $request->input('locales', []); // ['en', 'ru', ...]
        foreach ($locales as $locale) {
            ProgramCategoryTranslation::create([
                'program_category_id' => $category->id,
                'locale' => $locale,
                'title' => $request->input("title.$locale"),
                'description' => $request->input("description.$locale"),
            ]);
        }

        return redirect()->route('program_categories.index')
            ->with('success', 'Категория успешно создана.');
    }

    public function edit($id)
    {
        $category = ProgramCategory::with('translations')->findOrFail($id);
        return view('admin.program_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProgramCategory::findOrFail($id);

        // Обновляем slug
        $category->update([
            'slug' => $request->input('slug'),
        ]);

        // Обновляем переводы
        $locales = $request->input('locales', []);
        foreach ($locales as $locale) {
            $translation = ProgramCategoryTranslation::firstOrNew([
                'program_category_id' => $category->id,
                'locale' => $locale,
            ]);
            $translation->title = $request->input("title.$locale");
            $translation->description = $request->input("description.$locale");
            $translation->save();
        }

        return redirect()->route('program_categories.index')
            ->with('success', 'Категория успешно обновлена.');
    }

    public function destroy($id)
    {
        $category = ProgramCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('program_categories.index')
            ->with('success', 'Категория удалена.');
    }
}
