{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <title>Event Number</title>
</head>
<?php
 function isPrime($number) {
 if($number<=1) return false;
 $i = $number - 1;
 while($i>1) {
 if($number%$i==0) return false;
 $i--;
 }
 return true;
 }
?>
<body>
    <div class="card m-4">
     <div class="card-header">Prime Numbers</div>
     <div class="card-body">
     @foreach (range(1, 100) as $i)
     @if(isPrime($i))
     <span class="badge bg-primary">{{$i}}</span>
     @else
     <span class="badge bg-secondary">{{$i}}</span>
     @endif
     @endforeach
     </div>
    </div>
    </body> 
</html> --}}