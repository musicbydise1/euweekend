<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Здесь можно выводить список страниц, например, из БД
        return view('admin.pages.index');
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        // Логика сохранения страницы
        // Например: Page::create($request->all());
        return redirect()->route('pages.index')->with('success', 'Страница создана');
    }

    public function edit($id)
    {
        // Найдите страницу по id
        // $page = Page::findOrFail($id);
        return view('admin.pages.edit'/*, compact('page')*/);
    }

    public function update(Request $request, $id)
    {
        // Обновите страницу
        // $page = Page::findOrFail($id);
        // $page->update($request->all());
        return redirect()->route('pages.index')->with('success', 'Страница обновлена');
    }

    public function destroy($id)
    {
        // Удалите страницу
        // Page::destroy($id);
        return redirect()->route('pages.index')->with('success', 'Страница удалена');
    }
}
