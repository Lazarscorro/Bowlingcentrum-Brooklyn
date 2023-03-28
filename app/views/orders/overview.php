<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/public/css/overview.css">
</head>

<body>
    <h1>Bestellingen</h1>

    <a href="{{ route('order.create') }}" class="btn btn-primary mb-3">Create Order</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Ordernummer</th>
                <th>Pakket</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Telefoonnummer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->order_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>
