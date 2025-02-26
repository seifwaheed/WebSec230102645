{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            width: 200px;
            text-align: center;
        }
        .card-header {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        table {
            width: 100%;
            margin: auto;
        }
        td {
            padding: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class='row' >
            <h1 class="text-center">Multiplication Tables </h1>
            <h1 class="text-center">Seif Waheed</h1>
            <h1 class="text-center">230102645</h1>
            @foreach(range(1, 1034) as $j)
        <div class="col-sm-3">
            <div class="card m-2">
                <div class="card-header">{{ $j }} Multiplication Table</div>
                <div class="card-body">
                    <table>
                        @foreach(range(1, 10) as $i)
                        <tr>
                            <td>{{ $i }} * {{ $j }}</td>
                            <td>= {{ $i * $j }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}