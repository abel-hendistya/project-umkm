<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .product-card {
            background-color: #1e1e1e;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
        }
        .product-name {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 16px;
            color: #3498db;
            margin-bottom: 10px;
        }
        .btn {
            display: block;
            background-color: #3498db;
            color: #ffffff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            color: #3498db;
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Our Products</h1>
        <div class="product-grid">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="product-card">
                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="product-image">
                <div class="product-info">
                    <h2 class="product-name"><?php echo e($product->name); ?></h2>
                    <p class="product-price">$<?php echo e(number_format($product->price, 2)); ?></p>
                    <a href="/products/<?php echo e($product->id); ?>" class="btn">View Details</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="pagination">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\ecommerce-material\resources\views/products/index.blade.php ENDPATH**/ ?>