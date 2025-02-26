<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniTest - Supermarket Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Supermarket Bill</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price (per item)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $totalAmount = 0; @endphp
            @foreach ($bill as $item)
                <tr>
                    <td>{{ $item['item'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ $item['price'] }}</td>
                    <td>${{ $item['quantity'] * $item['price'] }}</td>
                </tr>
                @php
                 $totalAmount += $item['quantity'] * $item['price'];
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="3" class="text-end">
                    <strong>Total Amount:</strong>
                </td>
                <td><strong>${{ $totalAmount }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
