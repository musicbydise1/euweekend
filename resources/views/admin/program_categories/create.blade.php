@extends('layouts.admin')

@section('title', 'Create Program Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('program_categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" required>
                </div>

                <!-- Пример: локали en, ru (добавьте нужные) -->
                <input type="hidden" name="locales[]" value="en">
                <input type="hidden" name="locales[]" value="ru">

                <div class="form-group">
                    <label>Title (en)</label>
                    <input type="text" name="title[en]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description (en)</label>
                    <textarea name="description[en]" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Title (ru)</label>
                    <input type="text" name="title[ru]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description (ru)</label>
                    <textarea name="description[ru]" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
