<?php

require 'iban.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $accounts = file_get_contents(__DIR__ . '/../accounts.ser');
    $accounts = $accounts ? unserialize($accounts) : [];

    $accounts[] = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'personalId' => $_POST['personalId'],
        'accountNo' => $_POST['accountNo'],
        'id' => rand(100000000, 999999999)
    ];
    $accounts = serialize($accounts);
    file_put_contents(__DIR__ . '/../accounts.ser', $accounts);
    header('Location: ./');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <script src="app.js"></script>
    <title>Open a new account</title>
</head>

<body>

    <?php require __DIR__ . '/menu.php' ?>

    <div class="card">
        <h5 class="card-header">Open a new account</h5>
        <div class="card-body">

            <form class="row g-3" form action="./new_acc.php" method="post">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First name:</label>
                    <input type="text" class="form-control" name="firstName" placeholder="Enter your first name">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last name:</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Enter your last name">
                </div>
                <div class="col-md-6">
                    <label for="personalId" class="form-label">Personal ID number:</label>
                    <input type="text" class="form-control" name="personalId" placeholder="Enter your personal ID number">
                </div>
                <div class="col-md-6">
                    <label for="accountNo" class="form-label">Bank account number:</label>
                    <input type="text" class="form-control" name="accountNo" placeholder="(Lithuanian format) LT ..." value="<?= generateIban() ?>" readonly>
                </div>

                <div class="col-12">
                    <button type="submit" class="purple-gradient">Save</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>