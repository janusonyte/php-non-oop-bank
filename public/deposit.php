<?php

$accounts = file_get_contents(__DIR__ . '/../accounts.ser');
$accounts = $accounts ? unserialize($accounts) : [];

$accountId = $_GET['id'] ?? null;
$account = null;
if ($accountId) {
    foreach ($accounts as $acc) {
        if ($acc['id'] == $accountId) {
            $account = $acc;
            break;
        }
    }
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
    <title>Deposit money</title>
</head>

<body>

    <?php require __DIR__ . '/menu.php' ?>

    <div class="card">
        <h5 class="card-header">Deposit money</h5>
        <div class="card-body">

            <table class="table">
                <tbody>
                    <?php if ($account) : ?>
                        <tr>
                            <td><?= $account['firstName'] ?></td>
                            <td><?= $account['lastName'] ?></td>
                            <td><?= $account['personalId'] ?></td>
                            <td><?= $account['accountNo'] ?></td>
                            <td>0 Eur</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <form class="row g-3" form action="./deposit.php" method="post">
                <div class="col-12">
                    <label for="addMoney" class="form-label">Enter an amount</label>
                    <input type="text" class="form-control" name="addMoney" placeholder="0">
                </div>

                <div class="col-12">
                    <button type="submit" class="green">Deposit</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>