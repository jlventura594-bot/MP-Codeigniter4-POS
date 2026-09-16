<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h1>POS Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;">
            <?= session()->getFlashdata('error') ?>
        </p>
    <?php endif; ?>
    <form action="/login" method="post">

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