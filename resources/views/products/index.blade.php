<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Product List</h1>
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Product</a>

        <table class="w-full mt-6 border-collapse border border-gray-700">
            <thead>
                <tr>
                    <th class="border border-gray-700 px-4 py-2">Name</th>
                    <th class="border border-gray-700 px-4 py-2">Price</th>
                    <th class="border border-gray-700 px-4 py-2">Stock</th>
                    <th class="border border-gray-700 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border border-gray-700 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-700 px-4 py-2">{{ $product->price }}</td>
                        <td class="border border-gray-700 px-4 py-2">{{ $product->stock }}</td>
                        <td class="border border-gray-700 px-4 py-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
