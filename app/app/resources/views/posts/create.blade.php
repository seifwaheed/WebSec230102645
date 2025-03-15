@extends('layouts.app')
@section('Title')
    create
@endsection
@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</Label>
            <input name="Title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea  name="discreption" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label closs="form-label">Post Creator</label>
            <select name="posted_creator" class="form-control">
                <option value="1">Ahmed</option>
                <option value="2">Mohamed</option>
            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection
