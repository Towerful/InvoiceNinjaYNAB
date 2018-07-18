<?php

namespace Modules\YNABIntegration\Events\Handlers;

use App\Events\PaymentWasCreated;
use DebugBar\DebugBar;
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
        debug($event->payment);
        debug($payment);
        $config = YNAB\Configuration::getDefaultConfiguration()
                                    ->setApiKey('Authorization', config('ynabintegration.ApiKey'))
                                    ->setApiKeyPrefix('Authorization', 'Bearer');

        $apiInstance = new YNAB\Client\TransactionsApi(null, $config);
        $transaction = new YNAB\Model\TransactionWrapper([
            'transaction' => [
                'date'       => $payment->payment_date(),
                'amount'     => $payment->amount(),
                'approved'   => true,
                'cleared'    => 'cleared',
                'accountId'  => config('ynabintegration.AccountId'),
                'payee_name' => $payment->client(),
                'flag_color' => config('ynabintegration.TransactionColor'),
            ],
        ]);
        $apiInstance->createTransaction(config('ynabintegration.BudgetId'), $transaction);

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