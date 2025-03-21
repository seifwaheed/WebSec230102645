@extends('layouts.app')
@section('Title')
    create
@endsection
@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</Label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label closs="form-label">Post Creator</label>
            <select name="postCreator" class="form-control">
                @foreach ($users as $user)
                    <option value="1">{{ $user->name }}</option>
                @endforeach

            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection
