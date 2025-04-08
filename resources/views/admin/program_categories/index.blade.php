@extends('layouts.admin')

@section('title', 'Program Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Program Categories</h3>
            <div class="card-tools">
                <a href="{{ route('program_categories.create') }}" class="btn btn-primary">Create Category</a>
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
                    <th>Titles (Translations)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td>
                            @foreach($cat->translations as $trans)
                                <strong>{{ $trans->locale }}:</strong> {{ $trans->title }} <br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('program_categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('program_categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
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
