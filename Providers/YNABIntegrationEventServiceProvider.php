<?php

namespace Modules\YNABIntegration\Providers;

use App\Events\PaymentWasCreated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class YNABIntegrationEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        PaymentWasCreated::class => [

        ]
    ];
}
