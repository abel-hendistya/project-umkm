<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-4 bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center">Create an Account</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <div>
                <label for="password-confirm" class="block text-sm font-medium">Confirm Password</label>
                <input type="password" id="password-confirm" name="password_confirmation" required
                    class="w-full px-4 py-2 mt-2 bg-gray-700 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
            <button type="submit"
                class="w-full py-2 text-lg font-medium text-center text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                Register
            </button>
        </form>
        <p class="text-center text-sm text-gray-400">
            Already have an account?
            <a href="/login" class="text-indigo-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
