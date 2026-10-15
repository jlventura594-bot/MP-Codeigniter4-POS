<!DOCTYPE html>
<html>

<head>
    <title>Home</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a> |
        <a href="<?= site_url('products') ?>">Products</a> |
        <a href="<?= site_url('sales/new') ?>">Record Sale</a> |
        <a href="<?= site_url('sales') ?>">Sales History</a>
    </nav>

    <hr>
    <h1>POS System</h1>

    <?php if (session()->get('logged_in')): ?>

        <p>
            Logged in as:
            <?= esc(session()->get('username') ?? '') ?>
        </p>

        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit">Logout</button>
        </form>

    <?php endif; ?>

    <p>Welcome to the Home Page!</p>

</body>

</html>