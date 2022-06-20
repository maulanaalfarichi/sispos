<?php

namespace App\Presenter\Api\Territories;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use League\Fractal\TransformerAbstract;
use App\Modules\Territory\Models\District as DistrictContract;

class District extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array.
     *
     * @param  DistrictContract $item
     *
     * @return array
     */
    public function transform(DistrictContract $item)
    {
        return [
            'id'    => $item->id,
            'title' => $item->name,
        ];
    }
}
