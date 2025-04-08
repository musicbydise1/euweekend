@extends('layouts.admin')

@section('title', 'Days List')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Days</h3>
            <div class="card-tools">
                <a href="{{ route('days.create') }}" class="btn btn-primary">Create Day</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Program</th>
                    <th>Day Number</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($days as $day)
                    <tr>
                        <td>{{ $day->id }}</td>
                        <td>{{ optional($day->program)->slug }}</td>
                        <td>{{ $day->day_number }}</td>
                        <td>
                            <a href="{{ route('days.edit', $day->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('days.destroy', $day->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
