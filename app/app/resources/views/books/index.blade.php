@extends('layout.app')

@section('Title', 'Books')

@section('content')
<div class="container">
    <h2>Books List</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('books.show', $book->id) }}">{{ $book->title }} by {{ $book->author }} ({{ $book->published_year }})</a>
                <div>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
