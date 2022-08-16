<?php

function getTransactionsFiles(): array
{
    $files = [];

    foreach (scandir(FILES_PATH) as $file) {
        if (!is_dir($file)) {
            $files[] = FILES_PATH . $file;
        }
    }
    return $files;
}

function readTransactionsData($files): array
{
    $data = [];

    foreach ($files as $file) {
        $f = fopen($file, 'r');
        $row = fgetcsv($f);

        while (($row = fgetcsv($f)) !== false) {
            $data[] = extractTransaction($row);
        }
        fclose($f);
    }

    return $data;
}

function extractTransaction(array $transcationRow): array
{
    [$date, $checkNumber, $description, $amount] = $transcationRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        }else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}