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
            <?php if(session('success')): ?>
                <div class="mb-6 p-4 bg-green-600 text-white rounded-lg">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" class="max-w-lg mx-auto">
                <?php echo csrf_field(); ?>
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter product name" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block mb-2">Price</label>
                    <input type="number" name="price" id="price" step="0.01" placeholder="Enter product price" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label for="stock" class="block mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="Enter stock quantity" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required>
                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Enter product description" class="w-full px-3 py-2 bg-gray-800 rounded-lg" required></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition duration-300">Create Product</button>
            </form>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ecommerce-material\resources\views/admin/products/create.blade.php ENDPATH**/ ?>