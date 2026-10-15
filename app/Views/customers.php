<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customers</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customers</a>
        <a href="<?= site_url('users') ?>">Users</a>
        <a href="<?= site_url('products') ?>">Products</a>
        <a href="<?= site_url('sales/new') ?>">Record Sale</a>
        <a href="<?= site_url('sales') ?>">Sales History</a>
    </nav>

    <h1>Customer Accounts</h1>

    <?php if ($message = session()->getFlashdata('success')): ?>
        <p role="status" style="color: green;">
            <?= esc($message) ?>
        </p>
    <?php endif; ?>

    <?php if ($message = session()->getFlashdata('error')): ?>
        <p role="alert" style="color: red;">
            <?= esc($message) ?>
        </p>
    <?php endif; ?>

    <a class="action-link" href="<?= site_url('customers/new') ?>">
        Add Customer
    </a>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone'] ?? '') ?></td>

                    <td class="actions">
                        <a class="action-link"
                            href="<?= site_url('customers/edit/' . $customer['id']) ?>">
                            Edit
                        </a>

                        <form class="action-form"
                            action="<?= site_url('customers/delete/' . $customer['id']) ?>"
                            method="post"
                            onsubmit="return confirm('Delete this customer permanently?');">

                            <?= csrf_field() ?>

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>