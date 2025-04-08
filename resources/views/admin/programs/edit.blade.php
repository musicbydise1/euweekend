@extends('layouts.admin')

@section('title', 'Edit Program')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Program</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $program->slug }}" required>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="program_category_id" class="form-control">
                        <option value="">-- No Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                    @if($cat->id == $program->program_category_id) selected @endif>
                                {{ $cat->slug }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Is Premium?</label>
                    <input type="checkbox" name="is_premium" value="1" @if($program->is_premium) checked @endif>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $program->price }}">
                </div>

                <div class="form-group">
                    <label>Days (string)</label>
                    <input type="text" name="days" class="form-control" value="{{ $program->days }}">
                </div>

                <div class="form-group">
                    <label>Start Time</label>
                    <input type="datetime-local" name="start_time" class="form-control"
                           value="{{ $program->start_time ? $program->start_time->format('Y-m-d\TH:i') : '' }}">
                </div>

                <div class="form-group">
                    <label>End Time</label>
                    <input type="datetime-local" name="end_time" class="form-control"
                           value="{{ $program->end_time ? $program->end_time->format('Y-m-d\TH:i') : '' }}">
                </div>

                <div class="form-group">
                    <label>Duration (hours)</label>
                    <input type="number" name="duration_hours" class="form-control" value="{{ $program->duration_hours }}">
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $program->stock }}">
                </div>

                <!-- Новое поле для image -->
                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" name="image_file" class="form-control">
                </div>

                <hr>
                <h4>Translations</h4>
                @php
                    $en = $program->translations->where('locale','en')->first();
                    $ru = $program->translations->where('locale','ru')->first();
                @endphp

                <input type="hidden" name="locales[]" value="en">
                <input type="hidden" name="locales[]" value="ru">

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
