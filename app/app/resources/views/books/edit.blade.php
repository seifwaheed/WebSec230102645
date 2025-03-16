@extends('layout')

@section('Title', 'Edit Book')

@section('content')
<div class="container">
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label>Published Year</label>
            <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection
