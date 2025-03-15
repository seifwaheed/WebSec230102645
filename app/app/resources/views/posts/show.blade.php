@extends('layouts.app')
@section('Title')
    show
@endsection
@section('show')
    @foreach ($cards as $card)
        <div class="card" style="width: 18rem;">
            <img src= {{ asset('images/images.jpg') }} class="card-img-top" alt="HI">
            <div class="card-body">

                <h5 class="card-title">
                    {{ $card['id'] }}
                </h5>
                
                <p class="card-text">
                   name: {{ $card['Title'] }}
                </p>
                <p class="card-text">
                    posted by: {{ $card['Posted By'] }} AT -> {{ $card['Created At'] }}
                </p>
                
                <p class="card-text">
                    posted by: {{ $card['discreption'] }} 
                </p>

                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
