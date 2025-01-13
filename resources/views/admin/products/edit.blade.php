<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="w-full px-4 py-2 bg-gray-800 rounded" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block mb-2">Price</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" class="w-full px-4 py-2 bg-gray-800 rounded" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block mb-2">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="w-full px-4 py-2 bg-gray-800 rounded" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block mb-2">Category</label>
                <input type="text" name="category" id="category" value="{{ $product->category }}" class="w-full px-4 py-2 bg-gray-800 rounded" required>
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
</body>
</html>
