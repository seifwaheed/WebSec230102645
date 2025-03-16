@extends('layout')

@section('Title', 'Add Book')

@section('content')
<div class="container">
    <h2>Add a New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Published Year</label>
            <input type="number" name="published_year" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection
