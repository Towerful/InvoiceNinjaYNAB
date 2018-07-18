<?php

return [
    'name' => 'YNABIntegration',
    'YNABApiKey' => env('YNAB_API_KEY', 'YNAB_API_KEY Env Not Set'),
    'YNABAccountId' => env('YNAB_ACCOUNT_ID', 'YNAB_ACCOUNT_ID Env Not Set'),
    'YNABBudgetId' => env('YNAB_BUDGET_ID', 'YNAB_BUDGET_ID Env Not Set'),
    'YNABTransactionColor' => env('YNAB_TRANSACTION_COLOR', 'yellow'),
];
