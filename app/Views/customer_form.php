<?php
$isEditing = !empty($customer);

$title = $isEditing ? 'Edit Customer' : 'Add Customer';

$action = $isEditing
    ? site_url('customers/update/' . $customer['id'])
    : site_url('customers/create');

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

        <label for="full_name">Full Name</label>
        <br>
        <input id="full_name" type="text" name="full_name" maxlength="100" required
            value="<?= old('full_name', $customer['full_name'] ?? '') ?>">

        <br><br>

        <label for="email">Email</label>
        <br>
        <input id="email" type="email" name="email" maxlength="100" required
            value="<?= old('email', $customer['email'] ?? '') ?>">

        <br><br>

        <label for="phone">Phone (optional)</label>
        <br>
        <input id="phone" type="text" name="phone" maxlength="20" value="<?= old('phone', $customer['phone'] ?? '') ?>">

        <br><br>

        <button type="submit">
            <?= $isEditing ? 'Update Customer' : 'Save Customer' ?>
        </button>
    </form>

    <br>

    <a href="<?= site_url('customers') ?>">Back to Customers</a>

</body>

</html>