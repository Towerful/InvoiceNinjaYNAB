<?php

namespace Modules\YNABIntegration\Repositories;

use DB;
use Modules\Ynabintegration\Models\Ynabintegration;
use App\Ninja\Repositories\BaseRepository;
//use App\Events\YnabintegrationWasCreated;
//use App\Events\YnabintegrationWasUpdated;

class YnabintegrationRepository extends BaseRepository
{
    public function getClassName()
    {
        return 'Modules\Ynabintegration\Models\Ynabintegration';
    }

    public function all()
    {
        return Ynabintegration::scope()
                ->orderBy('created_at', 'desc')
                ->withTrashed();
    }

    public function find($filter = null, $userId = false)
    {
        $query = DB::table('ynabintegration')
                    ->where('ynabintegration.account_id', '=', \Auth::user()->account_id)
                    ->select(
                        
                        'ynabintegration.public_id',
                        'ynabintegration.deleted_at',
                        'ynabintegration.created_at',
                        'ynabintegration.is_deleted',
                        'ynabintegration.user_id'
                    );

        $this->applyFilters($query, 'ynabintegration');

        if ($userId) {
            $query->where('clients.user_id', '=', $userId);
        }

        /*
        if ($filter) {
            $query->where();
        }
        */

        return $query;
    }

    public function save($data, $ynabintegration = null)
    {
        $entity = $ynabintegration ?: Ynabintegration::createNew();

        $entity->fill($data);
        $entity->save();

        /*
        if (!$publicId || intval($publicId) < 0) {
            event(new ClientWasCreated($client));
        } else {
            event(new ClientWasUpdated($client));
        }
        */

        return $entity;
    }

}
