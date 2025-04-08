@extends('layouts.admin')

@section('title', 'Edit Day')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Day</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('days.update', $day->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Program</label>
                    <select name="program_id" class="form-control">
                        <option value="">-- Select Program --</option>
                        @foreach($programs as $prog)
                            <option value="{{ $prog->id }}" @if($prog->id == $day->program_id) selected @endif>
                                {{ $prog->slug }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Day Number</label>
                    <input type="number" name="day_number" class="form-control" value="{{ $day->day_number }}">
                </div>

                <hr>
                <h4>Translations</h4>
                @php
                    $en = $day->translations->where('locale','en')->first();
                    $ru = $day->translations->where('locale','ru')->first();
                @endphp

                <input type="hidden" name="locales[]" value="en">
                <input type="hidden" name="locales[]" value="ru">

                <div class="form-group">
                    <label>Day (en)</label>
                    <input type="text" name="day[en]" class="form-control" value="{{ $en->day ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Title (en)</label>
                    <input type="text" name="title[en]" class="form-control" value="{{ $en->title ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Description (en)</label>
                    <textarea name="description[en]" class="form-control">{{ $en->description ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label>Day (ru)</label>
                    <input type="text" name="day[ru]" class="form-control" value="{{ $ru->day ?? '' }}">
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
