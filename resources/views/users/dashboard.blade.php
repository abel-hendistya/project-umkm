<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Karya Material</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-black shadow-lg">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-bold text-white">Mitra Karya Material</a>
            <div>
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="ml-4 px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition duration-300">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-indigo-500 hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-indigo-500 hover:underline">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-16">
        <!-- Welcome Section -->
        <section class="text-center">
            <h1 class="text-5xl font-bold mb-6">Welcome to Mitra Karya Material</h1>
            <p class="text-xl mb-12">Discover amazing products at unbeatable prices!</p>
        </section>

        <!-- Products Section -->
        <section class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Available Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach ($products as $product)
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition duration-300 hover:shadow-2xl">
                        <img src="https://via.placeholder.com/300x200" alt="Product Image" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-400 mb-2">Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-gray-400 mb-4">Stock: {{ $product->stock }}</p>
                            <div class="flex justify-between items-center">
                                @if ($product->stock > 0)
                                    <form action="{{ route('products.buy', $product->id) }}" method="POST">
                                        @csrf
                                        <button
                                            type="button"
                                            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-300"
                                            onclick="window.open('https://wa.me/6281393613355?text=Halo,%20saya%20ingin%20membeli%20produk%20ini.', '_blank')">
                                            Buy Now
                                        </button>
                                    </form>
                                @else
                                    <button class="px-4 py-2 bg-gray-600 text-white rounded-lg" disabled>
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white mt-24">
        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-2xl font-bold mb-4">MK<span class="text-purple-500">Material</span></h3>
                    <p class="text-gray-400">Your one-stop shop for amazing products.</p>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="text-gray-400">
                        <li class="mb-2"><a href="#" class="hover:text-purple-500 transition duration-300">About Us</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-purple-500 transition duration-300">Contact</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-purple-500 transition duration-300">FAQ</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-purple-500 transition duration-300">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-purple-500 transition duration-300">Twitter</a>
                        <a href="#" class="text-gray-400 hover:text-purple-500 transition duration-300">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center text-gray-400">
                <p>&copy; 2023 Mitra Karya Material. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
