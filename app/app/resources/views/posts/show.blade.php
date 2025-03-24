@extends('layouts.app')
@section('Title')
    Post Detailss
@endsection
@section('show')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($singlepost as $post)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="my-0 fw-bold">Post #{{ $post['id'] }}</h4>
                        <span class="badge bg-secondary">{{ $post->created_at->format('M d, Y h:i A') }}</span>
                    </div>
                    
                    <img src="{{ asset('images/images.jpg') }}" class="card-img-top img-fluid" alt="Post Image">
                    
                    <div class="card-body">
                        <h3 class="card-title mb-3">{{ $post->title }}</h3>
                        
                        <div class="card-text mb-4">
                            <h6 class="text-muted mb-2">Description:</h6>
                            <p class="lead">{{ $post->description }}</p>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to Posts
                            </a>
                            <div>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <a href="#" class="btn btn-accent">
                                    <i class="fas fa-external-link-alt me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user me-1"></i> Posted by: Admin
                            </div>
                            <div>
                                <i class="fas fa-comments me-1"></i> 0 Comments
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        
        .card {
            overflow: hidden;
            border-radius: 10px;
        }
        
        .card-img-top {
            height: 300px;
            object-fit: cover;
        }
        
        .lead {
            font-size: 1.1rem;
            line-height: 1.6;
        }
    </style>
@endsection