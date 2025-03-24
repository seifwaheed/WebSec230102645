@extends('layouts.app')
@section('Title')
    Posts List
@endsection

@section('index')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="fas fa-clipboard-list me-2"></i>All Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-accent">
                <i class="fas fa-plus-circle me-1"></i> Create New Post
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td class="fw-semibold">{{ $post->title }}</td>
                                    <td>{{ Str::limit($post->description, 100) }}</td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info text-white">
                                                <i class="fas fa-eye me-1"></i> View
                                            </a>
                                            
                                            @if(Auth::user()->isAdmin())
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </a>
                                                
                                                <form method="POST" action="{{ route('posts.destroy', $post['id']) }}" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if(count($posts) == 0)
                    <div class="text-center py-5">
                        <i class="fas fa-file-alt fa-3x mb-3 text-muted"></i>
                        <p class="h5 text-muted">No posts found</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">Create Your First Post</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .btn-accent {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .table-responsive {
            border-radius: 5px;
            overflow: hidden;
        }
        
        .table th {
            vertical-align: middle;
        }
        
        .table td {
            vertical-align: middle;
            padding: 0.75rem;
        }
        
        .btn-sm {
            font-size: 0.8rem;
        }
    </style>
@endsection