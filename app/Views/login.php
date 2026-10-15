<!DOCTYPE html>
<html>

<head>
    <title>Login</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <h1>POS Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>
    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <label>Username</label>
        <br>
        <input type="text" name="username" required>

        <br><br>

        <label>Password</label>
        <br>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">
            Login
        </button>

    </form>

</body>

</html>