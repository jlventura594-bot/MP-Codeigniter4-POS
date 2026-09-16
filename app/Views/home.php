<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
    <h1>POS System</h1>

    <?php if (session()->get('logged_in')): ?>

        <p>
            Logged in as:
            <?= session()->get('username') ?>
        </p>

        <a href="<?= site_url('logout') ?>">Logout</a>

    <?php endif; ?>

    <p>Welcome to the Home Page!</p>

</body>

</html>