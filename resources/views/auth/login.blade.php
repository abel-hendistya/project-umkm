<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-4 bg-gray-800 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-white">Welcome Back!</h2>
        <p class="text-center text-gray-400">Login to your account</p>
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-gray-500 focus:outline-none">
            </div>
            <button type="submit"
                class="w-full py-2 text-lg font-medium text-center text-gray-900 bg-gray-300 rounded-lg hover:bg-gray-400 focus:ring-2 focus:ring-gray-500">
                Login
            </button>
        </form>
        <p class="text-center text-sm text-gray-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-gray-300 hover:underline">Sign Up</a>
        </p>
    </div>
</body>
</html>
