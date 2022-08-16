<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Lora', serif;
            font-family: 'Ubuntu', sans-serif;
        }

        h1,
        h2 {
            text-align: center;
            font-size: bold;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>SIMPLE BUDGETING & EXPENSE TRACKING</h1>
    <h2>Transactions Table</h2>

    <table>
        <tr>
            <th>Date</th>
            <th>Check #</th>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        <!-- PHP GOES HERE -->
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= formatDate($transaction['date']) ?></td>
                <td><?= $transaction['checkNumber'] ?></td>
                <td><?= $transaction['description'] ?></td>
                <td><?= formatAmount($transaction['amount']) ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;">Total Income:</td>
            <td><?= formatAmount($totals['totalIncome']) ?></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;">Total Expense:</td>
            <td><?= formatAmount($totals['totalExpense']) ?></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:right;font-weight:bold;">Net Total:</td>
            <td><?= formatAmount($totals['netTotal']) ?></td>
        </tr>
    </table>

</body>

</html>