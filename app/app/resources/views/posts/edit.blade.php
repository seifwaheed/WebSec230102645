@extends('layouts.app')
@section('Title')
    edit
@endsection
@section('edit')
    <div class="container">
        <h2>Edit Item</h2>

        <form method="POST" action="{{route('posts.update',1)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label closs="form-label">Title</label>
                <input name="Title" type="text" class="form-control">
            </DIV>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="postCreator" class="form-control">
                    <option value="1">Ahmed</option>
                    <option value="2">Mohamed</option>
                </select>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    @endsection
