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
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id }} </th>
                        <td>{{ $post->title }} </td>
                        <td>{{ $post->description }} </td>
                        <td>{{ $post->created_at }} </td>
                        <td>

                            <a href="{{ route('posts.show', $post->id) }}">
                                <button herh type="button" class="btn btn-info">View</button>
                            </a>

                            
                            @if(Auth::user()->isAdmin())
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                <form method="POST" action="{{ route('posts.destroy', $post['id']) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
