<?php

namespace Modules\YNABIntegration\Events\Handlers;

use App\Events\PaymentWasCreated;
use YNAB;

class YNABIntegrationPaymentWasCreated {

    public function __construct()
    {
        //
    }


    public function handle(PaymentWasCreated $event)
    {
        $payment = $event->payment->present();
        //public function amount()
        //public function completedAmount()
        //public function currencySymbol()
        //public function client()
        //public function payment_date()
        //public function month()
        //public function payment_type()
        //public function method()
        //public function calendarEvent($subColors = false)

        // Configure API key authorization: bearer
        $config = YNAB\Configuration::getDefaultConfiguration()
                                    ->setApiKey('Authorization', config('YNABApiKey'))
                                    ->setApiKeyPrefix('Authorization', 'Bearer');

        $apiInstance = new YNAB\Client\TransactionsApi(null, $config);
        $transaction = new YNAB\Model\TransactionWrapper([
            'transaction' => [
                'date'       => $payment->payment_date(),
                'amount'     => $payment->amount(),
                'approved'   => true,
                'cleared'    => 'cleared',
                'accountId'  => config('YNABAccountId'),
                'payee_name' => $payment->client(),
                'flag_color' => config('YNABTransactionColor'),
            ],
        ]);
        $apiInstance->createTransaction(config('YNABBudgetId'), $transaction);
    }
}

/*
 *         'id' => 'string',
        'date' => '\DateTime',
        'amount' => 'float',
        'cleared' => 'string',
        'approved' => 'bool',
        'accountId' => 'string',
        'accountName' => 'string',
        'subtransactions' => '\YNAB\Model\SubTransaction[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]

protected static $swaggerFormats = [
    'id' => 'uuid',
    'date' => 'date',
    'amount' => '1234000',
    'cleared' => null,
    'approved' => null,
    'accountId' => 'uuid',
    'accountName' => null,
    'subtransactions' => null
 */