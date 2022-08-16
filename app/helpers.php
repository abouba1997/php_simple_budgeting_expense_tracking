<?php

declare(strict_types=1);

function formatAmount(float $amount): string
{
    $isNegative = $amount < 0;
    $formatted = ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);

    return $isNegative ? "<span style=\"color:red\">$formatted</span>":"<span style=\"color:green\">$formatted</span>"; 
}

function formatDate(string $date): string
{
    return date('M j, Y', strtotime($date));
}