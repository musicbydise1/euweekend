@extends('layouts.admin')

@section('title', 'Edit Program Category')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('program_categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}" required>
                </div>

                <!-- Допустим, те же локали (en, ru) -->
                <input type="hidden" name="locales[]" value="en">
                <input type="hidden" name="locales[]" value="ru">

                @php
                    $en = $category->translations->where('locale','en')->first();
                    $ru = $category->translations->where('locale','ru')->first();
                @endphp

                <div class="form-group">
                    <label>Title (en)</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ $en->title ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Description (en)</label>
                    <textarea name="description[en]" class="form-control">{{ $en->description ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>Title (ru)</label>
                    <input type="text" name="title[ru]" class="form-control" value="{{ $ru->title ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Description (ru)</label>
                    <textarea name="description[ru]" class="form-control">{{ $ru->description ?? '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
