@extends('layouts.app')
@section('Title')
    index
@endsection

@section('index')
    <div class="text-center">
        <a href="{{ route('posts.create') }}">
            <button type="button" class="btn btn-success">
                Create post
            </button>
        </a>

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
                        <td>{{ $post['posted_creator'] }}</td>
                        <td>{{ $post['Created_At'] }}</td>
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
    </div>
@endsection
