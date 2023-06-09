<?php

$accounts = file_get_contents(__DIR__ . '/../accounts.ser');
$accounts = $accounts ? unserialize($accounts) : [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <script src="app.js"></script>
    <title>Homepage</title>
</head>




<body>
    <?php require __DIR__ . '/menu.php' ?>

    <div class="mainbod">
        <div class="card">
            <h5 class="card-header">Bank accounts</h5>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Personal ID number</th>
                            <th scope="col">Bank account number</th>
                            <th scope="col">Balance</th>
                            <th colspan="2">Edit balance</th>
                            <th scope="col">Close account</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $account) : ?>
                        <tr>
                            <td><?= $account['firstName'] ?></td>
                            <td><?= $account['lastName'] ?></td>
                            <td><?= $account['personalId'] ?></td>
                            <td><?= $account['accountNo'] ?></td>
                            <td>0 Eur</td>

                            <td>
                                <form action="./deposit.php?id=<?= $account['id'] ?>" method="post">
                                    <button class="green">Deposit</button>
                                </form>
                            </td>

                            <td>
                                <form action="./withdraw.php?id=<?= $account['id'] ?>" method="post">
                                    <button class="green">Withdraw</button>
                                </form>
                            </td>

                            <td>
                                <form action="./del_acc.php?id=<?= $account['id'] ?>" method="post">
                                    <button type="submit" class="red">Close account</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>



</body>

</html>