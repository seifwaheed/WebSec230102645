<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->product_name }}</td>
                <td>{{ $bill->price }}</td>
                <td>{{ $bill->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
</table>