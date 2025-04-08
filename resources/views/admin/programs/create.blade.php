@extends('layouts.admin')

@section('title', 'Create Program')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Program</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Основные поля -->
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="program_category_id" class="form-control">
                        <option value="">-- No Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->slug }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Is Premium?</label>
                    <input type="checkbox" name="is_premium" value="1">
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label>Days (string)</label>
                    <input type="text" name="days" class="form-control">
                </div>

                <div class="form-group">
                    <label>Start Time</label>
                    <input type="datetime-local" name="start_time" class="form-control">
                </div>

                <div class="form-group">
                    <label>End Time</label>
                    <input type="datetime-local" name="end_time" class="form-control">
                </div>

                <div class="form-group">
                    <label>Duration (hours)</label>
                    <input type="number" name="duration_hours" class="form-control">
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control">
                </div>

                <!-- Новое поле для image -->
                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="image_file" class="form-control">
                </div>

                <!-- Переводы -->
                <hr>
                <h4>Translations</h4>

                <!-- Допустим, локали: en, ru -->
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
