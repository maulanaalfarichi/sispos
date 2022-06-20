<?php

namespace App\Modules\Territory;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface Repository
{
    /**
     * Return province items.
     *
     * @param  int $page
     * @param  int $limit
     *
     * @return \Collection
     */
    public function searchProvinces($page = 1, $limit = 10);

    /**
     * Find province by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\Territory\Models\Province
     *
     * @throws \App\Modules\Territory\RecordNotFoundException
     */
    public function findProvince($id);

    /**
     * Return regency items.
     *
     * @param  array   $params
     * @param  int $page
     * @param  int $limit
     *
     * @return \Collection
     */
    public function searchRegencies(array $params = [], $page = 1, $limit = 10);

    /**
     * Find regency by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\Territory\Models\Regency
     *
     * @throws \App\Modules\Territory\RecordNotFoundException
     */
    public function findRegency($id);

    /**
     * Return district items.
     *
     * @param  array   $params
     * @param  int $page
     * @param  int $limit
     *
     * @return \Collection
     */
    public function searchDistricts(array $params = [], $page = 1, $limit = 10);

    /**
     * Find district by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\Territory\Models\District
     *
     * @throws \App\Modules\Territory\RecordNotFoundException
     */
    public function findDistrict($id);

    /**
     * Return village items.
     *
     * @param  array   $params
     * @param  int $page
     * @param  int $limit
     *
     * @return \Collection
     */
    public function searchVillages(array $params = [], $page = 1, $limit = 10);

    /**
     * Find village by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\Territory\Models\Village
     *
     * @throws \App\Modules\Territory\RecordNotFoundException
     */
    public function findVillage($id);

    /**
     * Return latest query total items.
     *
     * @return int
     */
    public function getTotal();
}
