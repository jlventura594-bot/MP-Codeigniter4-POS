<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sales History</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a> |
        <a href="<?= site_url('products') ?>">Products</a> |
        <a href="<?= site_url('sales') ?>">Sales History</a>
    </nav>

    <hr>

    <h1>Sales History</h1>

    <?php if ($message = session()->getFlashdata('success')): ?>
        <p role="status" style="color: green;">
            <?= esc($message) ?>
        </p>
    <?php endif; ?>

    <a href="<?= site_url('sales/new') ?>">Record Sale</a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Sale ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Staff</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($sales)): ?>
                <tr>
                    <td colspan="7">No sales recorded yet.</td>
                </tr>
            <?php endif; ?>

            <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?= (int) $sale['id'] ?></td>
                    <td><?= esc($sale['product_name']) ?></td>
                    <td><?= esc($sale['customer_name'] ?? 'Walk-in customer') ?></td>
                    <td><?= esc($sale['staff_name']) ?></td>
                    <td><?= (int) $sale['quantity'] ?></td>
                    <td>
                        PHP <?= number_format((float) $sale['total_price'], 2) ?>
                    </td>
                    <td><?= esc($sale['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>