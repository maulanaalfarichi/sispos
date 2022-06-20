<?php

namespace App\Modules\CommandPost;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface Repository
{
    /**
     * Return list items.
     *
     * @param  array   $params
     * @param  int $page
     * @param  int $limit
     *
     * @return \Collection
     */
    public function search(array $params = [], $page = 1, $limit = 10);

    /**
     * Find a item by params.
     *
     * @param  array $params
     *
     * @return \App\Modules\CommandPost\Models\CommandPost
     *
     * @throws \App\Modules\CommandPost\RecordNotFoundException
     */
    public function findBy(array $params);

    /**
     * Find the item by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\CommandPost\Models\CommandPost
     *
     * @throws \App\Modules\CommandPost\RecordNotFoundException
     */
    public function find($id);

    /**
     * Create a new item.
     *
     * @param  array $data
     *
     * @return \App\Modules\CommandPost\Models\CommandPost|null
     * @throws \RuntimeException
     */
    public function create(array $data);

    /**
     * Return latest query total items.
     *
     * @return int
     */
    public function getTotal();

    /**
     * Create a new instance of the model.
     *
     * @return \App\Modules\CommandPost\Models\CommandPost
     */
    public function createModel();
}
