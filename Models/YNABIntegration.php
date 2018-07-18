<?php

namespace Modules\YNABIntegration\Models;

use App\Models\EntityModel;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class YNABIntegration extends EntityModel
{
    use PresentableTrait;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $presenter = 'Modules\YNABIntegration\Presenters\YNABIntegrationPresenter';

    /**
     * @var string
     */
    protected $fillable = [""];

    /**
     * @var string
     */
    protected $table = 'ynabintegration';

    public function getEntityType()
    {
        return 'ynabintegration';
    }

}
