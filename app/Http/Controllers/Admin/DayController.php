<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\DayTranslation;
use App\Models\Program;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        // Можно вывести все дни, или только связанные с какой-то программой
        $days = Day::with('program')->get();
        return view('admin.days.index', compact('days'));
    }

    public function create()
    {
        // Нужно выбрать программу, к которой относится день
        $programs = Program::all();
        return view('admin.days.create', compact('programs'));
    }

    public function store(Request $request)
    {
        // Создаём запись в таблице days
        $day = Day::create([
            'program_id' => $request->input('program_id'),
            'day_number' => $request->input('day_number'),
            // Добавляем image
            'image' => $request->input('image'),
        ]);

        // Создаём переводы
        $locales = $request->input('locales', []);
        foreach ($locales as $locale) {
            DayTranslation::create([
                'day_id' => $day->id,
                'locale' => $locale,
                'day' => $request->input("day.$locale"), // "Day 1", "День 1", ...
                'title' => $request->input("title.$locale"),
                'description' => $request->input("description.$locale"),
            ]);
        }

        return redirect()->route('days.index')
            ->with('success', 'День успешно создан.');
    }

    public function edit($id)
    {
        $day = Day::with('translations')->findOrFail($id);
        $programs = Program::all();
        return view('admin.days.edit', compact('day', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $day = Day::findOrFail($id);

        // Обновляем основную запись
        $day->update([
            'program_id' => $request->input('program_id'),
            'day_number' => $request->input('day_number'),
            // Добавляем image
            'image' => $request->input('image'),
        ]);

        // Обновляем/создаём переводы
        $locales = $request->input('locales', []);
        foreach ($locales as $locale) {
            $translation = DayTranslation::firstOrNew([
                'day_id' => $day->id,
                'locale' => $locale,
            ]);
            $translation->day = $request->input("day.$locale");
            $translation->title = $request->input("title.$locale");
            $translation->description = $request->input("description.$locale");
            $translation->save();
        }

        return redirect()->route('days.index')
            ->with('success', 'День обновлён.');
    }

    public function destroy($id)
    {
        $day = Day::findOrFail($id);
        $day->delete();

        return redirect()->route('days.index')
            ->with('success', 'День удалён.');
    }
}
