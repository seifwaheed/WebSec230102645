<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <title>Event Number</title>
</head>

<body>
    <div class="card m-3">
        <div class="card-header">Even Numbers</div>
        <div class="card-body">
            @foreach (range(1, 100) as $i)
                @if ($i % 2 == 0)
                    <span class="badge" style="background-color: green">{{ $i }}</span>
                @else
                    <span class="badge" style="background-color: red">{{ $i }}</span>
                @endif
            @endforeach
        </div>
    </div>
</body>

</html>
// private function checkPrime($number)
// {
//     if ($number <= 1) return false;
//     if ($number <= 3) return true;
    
//     if ($number % 2 == 0 || $number % 3 == 0) return false;
    
//     for ($i = 5; $i * $i <= $number; $i += 6) {
//         if ($number % $i == 0 || $number % ($i + 2) == 0) {
//             return false;
//         }
//     }
    
//     return true;
// }