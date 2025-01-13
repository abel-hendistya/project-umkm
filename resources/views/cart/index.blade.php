<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1e1e1e;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        .remove-btn {
            color: #e74c3c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        @if(count($cartItems) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $id => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <a href="/cart/remove/{{ $id }}" class="remove-btn">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            Total: ${{ number_format($total, 2) }}
        </div>
        <a href="/checkout" class="btn">Proceed to Checkout</a>
        @else
        <p>Your cart is empty.</p>
        @endif
    </div>
</body>
</html>