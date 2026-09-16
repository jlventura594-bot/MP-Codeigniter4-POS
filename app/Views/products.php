<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a> |
        <a href="<?= site_url('products') ?>">Products</a>
    </nav>

    <hr>

    <h1>Products</h1>

    <table border="1">

        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>

        <?php foreach ($products as $product): ?>

            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= $product['price']; ?></td>
                <td><?= $product['stock_quantity']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>