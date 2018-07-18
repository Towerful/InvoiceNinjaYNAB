<?php

namespace Modules\YNABIntegration\Providers;

use App\Events\PaymentWasCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Modules\YNABIntegration\Events\Handlers\YNABIntegrationPaymentWasCreated;

class YNABIntegrationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        PaymentWasCreated::class => [
            YNABIntegrationPaymentWasCreated::class
        ]
    ];
}
