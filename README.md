# InvoiceNinjaYNAB
YNAB Integration for InvoiceNinja. 
When Invoice is marked payed, it adds the transaction to the appropriate budget/account in YNAB

Install using the command
`php artisan module:install Towerful/InvoiceNinjaYNAB --type=github`

Make sure you have environment variables set up for

```
YNAB_API_KEY           -> this is retrieved from YNAB Account Settings -> Developer Settings -> New Key
YNAB_BUDGET_ID         -> this is retrieved from the first part of the URI when viewing a budget https://app.youneedabudget.com/{BUDGET_ID}/budget/{DATE}
YNAB_ACCOUNT_ID        -> this is retrieved from the 2nd part of the URI when viewing an account https://app.youneedabudget.com/{BUDGET_ID}/accounts/{ACCOUNT_ID}
YNAB_CATEGORY_ID       -> this is the category automatically assigned to the payment. This can be retrieved from https://api.youneedabudget.com/v1#/Categories/getCategories
YNAB_AMOUNT_MULTIPLIER -> YNAB works in milli-currencies. This should be 1000, unless you personally automatically deduct tax from income
YNAB_TRANSACTION_COLOR -> The color for automated transfers
```
