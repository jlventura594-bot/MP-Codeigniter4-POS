<?php
$isEditing = !empty($product);

$title = $isEditing ? 'Edit Product' : 'Add Product';

$action = $isEditing
    ? site_url('products/update/' . $product['id'])
    : site_url('products/create');

$errors = session()->getFlashdata('errors') ?? [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <h1><?= esc($title) ?></h1>

    <?php if ($message = session()->getFlashdata('success')): ?>
        <p role="status" style="color: green;">
            <?= esc($message) ?>
        </p>
    <?php endif; ?>

    <?php if ($errors): ?>
        <div role="alert" style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= esc($action, 'attr') ?>" method="post">
        <?= csrf_field() ?>

        <?php if ($isEditing): ?>
            <input type="hidden" name="original_stock_quantity"
                value="<?= old('original_stock_quantity', $product['stock_quantity']) ?>">
        <?php endif; ?>

        <label for="name">Product Name</label>
        <br>
        <input id="name" type="text" name="name" maxlength="100" required
            value="<?= old('name', $product['name'] ?? '') ?>">

        <br><br>

        <label for="price">Price (PHP)</label>
        <br>
        <input id="price" type="number" name="price" min="0" max="99999999.99" step="0.01" required
            value="<?= old('price', $product['price'] ?? '') ?>">

        <br><br>

        <label for="stock_quantity">Stock Quantity</label>
        <br>
        <input id="stock_quantity" type="number" name="stock_quantity" min="0" max="2147483647" step="1" required
            value="<?= old('stock_quantity', $product['stock_quantity'] ?? '0') ?>">

        <br><br>

        <button type="submit">
            <?= $isEditing ? 'Update Product' : 'Save Product' ?>
        </button>
    </form>

    <?php if ($isEditing): ?>
        <h2>Product Image</h2>

        <?= view('partials/product_image', [
            'productImage' => $product['image'] ?? null,
        ]) ?>

        <p>Choose a JPG or PNG image, up to 2 MB.</p>
        <p>Save any product-detail changes before uploading an image.</p>

        <form action="<?= site_url('products/image/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <label for="image">Product image</label>
            <br>

            <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png" required>

            <br><br>

            <button type="submit">Save Product Image</button>
        </form>
    <?php else: ?>
        <p>After creating this product, open Edit to upload its image.</p>
    <?php endif; ?>

    <br>

    <a href="<?= site_url('products') ?>">Back to Products</a>

</body>

</html>