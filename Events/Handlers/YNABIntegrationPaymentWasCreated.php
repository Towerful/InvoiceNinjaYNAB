<?php

namespace Modules\YNABIntegration\Events\Handlers;

use App\Events\PaymentWasCreated;
use App\Models\Payment;
use YNAB;

class YNABIntegrationPaymentWasCreated {

    public function __construct()
    {
        //
    }


    public function handle(PaymentWasCreated $event)
    {
        $config = YNAB\Configuration::getDefaultConfiguration()
                                    ->setApiKey('Authorization', config('ynabintegration.ApiKey'))
                                    ->setApiKeyPrefix('Authorization', 'Bearer');

        $apiInstance = new YNAB\Client\TransactionsApi(null, $config);
        $transaction = new YNAB\Model\TransactionWrapper($this->makeTransactionFromPayment($event->payment));
        $apiInstance->createTransaction(config('ynabintegration.BudgetId'), $transaction);

    }


    private function makeTransactionFromPayment(Payment $payment)
    {
        $presenter = $payment->present();

        return [
            'transaction' => [
                'date'        => $presenter->payment_date(),
                'amount'      => $payment->amount * config('ynabintegration.AmountMultiplier'),
                'memo'        => 'Invoice ID: ' . $payment->invoice->invoice_number,
                'approved'    => true,
                'cleared'     => 'cleared',
                'account_id'  => config('ynabintegration.AccountId'),
                'category_id' => config('ynabintegration.CategoryId'),
                'payee_name'  => $presenter->client(),
                'flag_color'  => config('ynabintegration.TransactionColor'),
            ],
        ];
    }
}