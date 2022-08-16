<?php

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define("APP_PATH", $root . 'app' . DIRECTORY_SEPARATOR);
define("FILES_PATH", $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define("VIEWS_PATH", $root . 'views' . DIRECTORY_SEPARATOR);

// Here the logic of my applications

require APP_PATH . 'App.php';
require APP_PATH . 'helpers.php';

$files = getTransactionsFiles();

$transactions = readTransactionsData($files);

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';
