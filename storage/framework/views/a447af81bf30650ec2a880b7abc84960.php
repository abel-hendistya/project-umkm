<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-gray-800 py-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="<?php echo e(route('home')); ?>" class="text-3xl font-bold text-white">Admin Dashboard</a>
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="ml-4 px-4 py-2 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition duration-300">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-indigo-500 hover:underline">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="ml-4 text-indigo-500 hover:underline">Register</a>
                <?php endif; ?>
            </div>
        </header>

        <!-- Content -->
        <main class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Sales -->
                <div class="p-6 bg-gray-800 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Total Sales</h2>
                    <p class="mt-4 text-3xl font-bold">$15,320</p>
                </div>

                <!-- Total Products -->
                <div class="p-6 bg-gray-800 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Total Products</h2>
                    <p class="mt-4 text-3xl font-bold">120</p>
                </div>

                <!-- Total Orders -->
                <div class="p-6 bg-gray-800 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="mt-4 text-3xl font-bold">450</p>
                </div>
            </div>

            <!-- Sales Chart -->
            <div class="mt-8 p-6 bg-gray-800 rounded-lg shadow">
                <h2 class="text-lg font-semibold">Sales Overview</h2>
                <div class="mt-4 h-64 bg-gray-700 rounded-lg flex items-center justify-center">
                    <p>Chart Placeholder</p>
                </div>
            </div>

            <!-- Product Management -->
            <div class="mt-8 p-6 bg-gray-800 rounded-lg shadow">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold">Product Management</h2>
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition duration-300">Add New Product</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="p-3">ID</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Price</th>
                                <th class="p-3">Stock</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-700">
                                <td class="p-3"><?php echo e($product->id); ?></td>
                                <td class="p-3"><?php echo e($product->name); ?></td>
                                <td class="p-3">$<?php echo e(number_format($product->price, 2)); ?></td>
                                <td class="p-3"><?php echo e($product->stock); ?></td>
                                <td class="p-3">
                                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="text-blue-500 hover:underline mr-2">Edit</a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\ecommerce-material\resources\views/admin/products/index.blade.php ENDPATH**/ ?>