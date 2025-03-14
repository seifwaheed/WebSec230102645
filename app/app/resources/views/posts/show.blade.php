@extends('layouts.app')
@section('Title')
    show
@endsection
@section('show')
    @foreach ($cards as $card)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="HI">
            <div class="card-body">

                <h5 class="card-title">
                    {{ $card['name'] }}
                </h5>
                
                <p class="card-text">
                    {{ $card['DESCRIPTION'] }}
                </p>
                
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection
