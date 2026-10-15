<?php
$errors = session()->getFlashdata('errors') ?? [];

$selectedProduct = old('product_id', '', false);
$selectedCustomer = old('customer_id', '', false);
$quantity = old('quantity', '1', false);

// Avoid rendering malformed array inputs as form values.
$selectedProduct = is_string($selectedProduct) ? $selectedProduct : '';
$selectedCustomer = is_string($selectedCustomer) ? $selectedCustomer : '';
$quantity = is_string($quantity) ? $quantity : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Record Sale</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <h1>Record Sale</h1>

    <p>
        Staff:
        <?= esc(session()->get('full_name') ?? session()->get('username')) ?>
    </p>

    <?php if ($errors): ?>
        <div role="alert" style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('sales/create') ?>" method="post">
        <?= csrf_field() ?>

        <label for="product_id">Product</label>
        <br>

        <select id="product_id" name="product_id" required>
            <option value="">Select a product</option>

            <?php foreach ($products as $product): ?>
                <option
                    value="<?= (int) $product['id'] ?>"
                    <?= $selectedProduct === (string) $product['id'] ? 'selected' : '' ?>
                    <?= (int) $product['stock_quantity'] < 1 ? 'disabled' : '' ?>
                >
                    <?= esc($product['name']) ?>
                    — PHP <?= number_format((float) $product['price'], 2) ?>
                    — Stock: <?= (int) $product['stock_quantity'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="customer_id">Customer (optional)</label>
        <br>

        <select id="customer_id" name="customer_id">
            <option value="">Walk-in customer</option>

            <?php foreach ($customers as $customer): ?>
                <option
                    value="<?= (int) $customer['id'] ?>"
                    <?= $selectedCustomer === (string) $customer['id'] ? 'selected' : '' ?>
                >
                    <?= esc($customer['full_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="quantity">Quantity</label>
        <br>

        <input
            id="quantity"
            type="number"
            name="quantity"
            min="1"
            max="2147483647"
            step="1"
            required
            value="<?= esc($quantity, 'attr') ?>"
        >

        <p>The total uses the product price at the time the sale is recorded.</p>

        <button type="submit">Record Sale</button>
    </form>

    <br>

    <a href="<?= site_url('sales') ?>">Sales History</a> |
    <a href="<?= site_url('products') ?>">Products</a> |
    <a href="<?= site_url('/') ?>">Home</a>

</body>

</html>