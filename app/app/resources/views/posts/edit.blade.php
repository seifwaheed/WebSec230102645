@extends('layouts.app')
@section('Title')
    Edit Post
@endsection
@section('content')
    <div class="container">
        <h2>Edit Item</h2>

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="Title" type="text" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Post Creator</label>
                <select name="postCreator" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $post->postCreator == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach 
                </select>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
