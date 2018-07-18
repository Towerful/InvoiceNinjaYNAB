<?php

namespace Modules\YNABIntegration\Transformers;

use Modules\Ynabintegration\Models\Ynabintegration;
use App\Ninja\Transformers\EntityTransformer;

/**
 * @SWG\Definition(definition="Ynabintegration", @SWG\Xml(name="Ynabintegration"))
 */

class YnabintegrationTransformer extends EntityTransformer
{
    /**
    * @SWG\Property(property="id", type="integer", example=1, readOnly=true)
    * @SWG\Property(property="user_id", type="integer", example=1)
    * @SWG\Property(property="account_key", type="string", example="123456")
    * @SWG\Property(property="updated_at", type="integer", example=1451160233, readOnly=true)
    * @SWG\Property(property="archived_at", type="integer", example=1451160233, readOnly=true)
    */

    /**
     * @param Ynabintegration $ynabintegration
     * @return array
     */
    public function transform(Ynabintegration $ynabintegration)
    {
        return array_merge($this->getDefaults($ynabintegration), [
            
            'id' => (int) $ynabintegration->public_id,
            'updated_at' => $this->getTimestamp($ynabintegration->updated_at),
            'archived_at' => $this->getTimestamp($ynabintegration->deleted_at),
        ]);
    }
}
