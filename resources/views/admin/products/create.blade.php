<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col">
        <header class="bg-gray-800 py-4">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">Create New Product</h1>
            </div>
        </header>

        <main class="container mx-auto py-8">
            <!-- Flash Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-600 text-white rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter product name" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block mb-2">Price</label>
                    <input type="number" name="price" id="price" step="0.01" placeholder="Enter product price" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label for="stock" class="block mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="Enter stock quantity" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Enter product description" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required></textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition duration-300">Create Product</button>
            </form>
        </main>
    </div>
</body>
</html>
