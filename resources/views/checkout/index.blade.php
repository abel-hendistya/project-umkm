<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #333;
            background-color: #1e1e1e;
            color: #ffffff;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .order-summary {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .order-summary h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <div class="order-summary">
            <h2>Order Summary</h2>
            @foreach($cartItems as $item)
            <div class="order-item">
                <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
            </div>
            @endforeach
            <div class="order-item">
                <strong>Total:</strong>
                <strong>${{ number_format($total, 2) }}</strong>
            </div>
        </div>
        <form action="/checkout" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <button type="submit" class="btn">Place Order</button>
        </form>
    </div>
</body>
</html>