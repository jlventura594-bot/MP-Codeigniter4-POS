<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Edit Customer</h1>

<form action="/customers/update/<?= $customer['id'] ?>" method="post">

    <label>Full Name</label>
    <br>
    <input
        type="text"
        name="full_name"
        value="<?= $customer['full_name'] ?>"
    >

    <br><br>

    <label>Email</label>
    <br>
    <input
        type="email"
        name="email"
        value="<?= $customer['email'] ?>"
    >

    <br><br>

    <label>Phone</label>
    <br>
    <input
        type="text"
        name="phone"
        value="<?= $customer['phone'] ?>"
    >

    <br><br>

    <button type="submit">
        Update Customer
    </button>

</form>

<br>

<a href="/customers">Back to Customers</a>

</body>
</html>