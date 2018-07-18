<?php

return [
    'name'             => 'YNABIntegration',
    'ApiKey'           => env('YNAB_API_KEY', 'YNAB_API_KEY Env Not Set'),
    'AccountId'        => env('YNAB_ACCOUNT_ID', 'YNAB_ACCOUNT_ID Env Not Set'),
    'BudgetId'         => env('YNAB_BUDGET_ID', 'YNAB_BUDGET_ID Env Not Set'),
    'AmountMultiplier' => env('YNAB_AMOUNT_MULTIPLIER', 1000),
    'TransactionColor' => env('YNAB_TRANSACTION_COLOR', 'yellow'),
    'CategoryId'       => env('YNAB_CATEGORY_ID', null),
];
