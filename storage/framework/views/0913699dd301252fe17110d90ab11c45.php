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
                <h1 class="text-3xl font-bold">Admin Dashboard</h1>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Content -->
        <main class="container mx-auto py-8 space-y-8">
            <!-- Product Management -->
            <section class="bg-gray-800 p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Product Management</h2>
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                        Add New Product
                    </a>
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
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-gray-700">
                                    <td class="p-3"><?php echo e($product->id); ?></td>
                                    <td class="p-3"><?php echo e($product->name); ?></td>
                                    <td class="p-3">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-400">No products available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Transaction Summary -->
            <section class="bg-gray-800 p-6 rounded-lg shadow">
                <h2 class="text-2xl font-semibold mb-4">Transaction Summary</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="p-3">Transaction ID</th>
                                <th class="p-3">Product Name</th>
                                <th class="p-3">Quantity</th>
                                <th class="p-3">Total Price</th>
                                <th class="p-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-gray-700">
                                    <td class="p-3"><?php echo e($transaction->id); ?></td>
                                    <td class="p-3"><?php echo e($transaction->product->name); ?></td>
                                    <td class="p-3"><?php echo e($transaction->quantity); ?></td>
                                    <td class="p-3">Rp<?php echo e(number_format($transaction->total_price, 0, ',', '.')); ?></td>
                                    <td class="p-3"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-400">No transactions found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ecommerce-material\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>