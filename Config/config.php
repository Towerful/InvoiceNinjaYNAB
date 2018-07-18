<?php

return [
    'name' => 'YNABIntegration',
    'YNABApiKey' => env('YNAB_API_KEY', ''),
    'YNABAccountId' => env('YNAB_ACCOUNT_ID', ''),
    'YNABBudgetId' => env('YNAB_BUDGET_ID', ''),
    'YNABTransactionColor' => env('YNAB_TRANSACTION_COLOR', 'yellow'),
];
