<?php

namespace Modules\YNABIntegration\Datatables;

use Utils;
use URL;
use Auth;
use App\Ninja\Datatables\EntityDatatable;

class YNABIntegrationDatatable extends EntityDatatable
{
    public $entityType = 'ynabintegration';
    public $sortCol = 1;

    public function columns()
    {
        return [
            
            [
                'created_at',
                function ($model) {
                    return Utils::fromSqlDateTime($model->created_at);
                }
            ],
        ];
    }

    public function actions()
    {
        return [
            [
                mtrans('ynabintegration', 'edit_ynabintegration'),
                function ($model) {
                    return URL::to("ynabintegration/{$model->public_id}/edit");
                },
                function ($model) {
                    return Auth::user()->can('editByOwner', ['ynabintegration', $model->user_id]);
                }
            ],
        ];
    }

}
