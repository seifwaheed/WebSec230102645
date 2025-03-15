@extends('layouts.app')
@section('Title')
    show
@endsection
@section('show')
    @foreach ($singlepost as $post)
        <div class="card" style="width: 18rem;">
            <img src= {{ asset('images/images.jpg') }} class="card-img-top" alt="HI">
            <div class="card-body">

                <h5 class="card-title">
                    {{ $post['id'] }}
                </h5>
                
                <p class="card-text">
                   name: {{ $post['Title'] }}
                </p>
                <p class="card-text">
                    posted by: {{ $post['postCreator'] }} AT -> {{ $post['Created_At'] }}
                </p>
                
                
                <p class="card-text">
                    Description: {{ $post['description'] }} 
                </p>
                

                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
