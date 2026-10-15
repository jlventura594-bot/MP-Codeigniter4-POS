<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>

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

    <h1>User Accounts</h1>

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

    <a class="action-link" href="<?= site_url('users/new') ?>">
        Add Staff Account
    </a>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?= view('partials/avatar', [
                            'avatar' => $user['avatar'] ?? null,
                        ]) ?>
                    </td>

                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>

                    <td class="actions">
                        <a class="action-link"
                            href="<?= site_url('users/edit/' . $user['id']) ?>">
                            Edit
                        </a>

                        <form class="action-form"
                            action="<?= site_url('users/delete/' . $user['id']) ?>"
                            method="post"
                            onsubmit="return confirm('Delete this staff account permanently?');">

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