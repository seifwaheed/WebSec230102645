@extends('layouts.app')
@section('Title') index @endsection

@section('index')
    <div class="text-center">
        <button type="button" class="btn btn-success">Create post</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th>{{ $post['id'] }}</th>
                    <td>{{ $post['Title'] }}</td>
                    <td>{{ $post['Posted By'] }}</td>
                    <td>{{ $post['Created At'] }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post['id']) }}">
                            <button herh type="button" class="btn btn-info">View</button>
                        </a>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
