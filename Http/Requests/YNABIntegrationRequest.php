<?php

namespace Modules\YNABIntegration\Http\Requests;

use App\Http\Requests\EntityRequest;

class YNABIntegrationRequest extends EntityRequest
{
    protected $entityType = 'ynabintegration';
}
