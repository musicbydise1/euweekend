@extends('layouts.admin')

@section('title', 'Create Day')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Day</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('days.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Program</label>
                    <select name="program_id" class="form-control">
                        <option value="">-- Select Program --</option>
                        @foreach($programs as $prog)
                            <option value="{{ $prog->id }}">{{ $prog->slug }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Day Number</label>
                    <input type="number" name="day_number" class="form-control">
                </div>

                <hr>
                <h4>Translations</h4>
                <input type="hidden" name="locales[]" value="en">
                <input type="hidden" name="locales[]" value="ru">

                <div class="form-group">
                    <label>Day (en)</label>
                    <input type="text" name="day[en]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Title (en)</label>
                    <input type="text" name="title[en]" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description (en)</label>
                    <textarea name="description[en]" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Day (ru)</label>
                    <input type="text" name="day[ru]" class="form-control">
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
