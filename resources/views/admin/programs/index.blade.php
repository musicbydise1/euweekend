@extends('layouts.admin')

@section('title', 'Programs List')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Programs</h3>
            <div class="card-tools">
                <a href="{{ route('programs.create') }}" class="btn btn-primary">Create Program</a>
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
                    <th>Slug</th>
                    <th>Category</th>
                    <th>Premium</th>
                    <th>Image</th> <!-- новая колонка -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>{{ $program->id }}</td>
                        <td>{{ $program->slug }}</td>
                        <td>{{ optional($program->category)->slug }}</td>
                        <td>{{ $program->is_premium ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($program->image)
                                <!-- Показать миниатюру, если нужно -->
                                <img src="{{ $program->image }}" alt="image" width="80">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;">
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
