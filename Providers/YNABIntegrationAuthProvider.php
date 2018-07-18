<?php

namespace Modules\YNABIntegration\Providers;

use App\Providers\AuthServiceProvider;

class YNABIntegrationAuthProvider extends AuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Modules\Ynabintegration\Models\Ynabintegration::class => \Modules\Ynabintegration\Policies\YnabintegrationPolicy::class,
    ];
}
