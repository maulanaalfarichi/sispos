<?php

namespace App\Modules\Message;

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
     * @return \Message
     */
    public function search(array $params = [], $page = 1, $limit = 10);

    /**
     * Find the item by it's ID.
     *
     * @param  int $id
     *
     * @return \App\Modules\Message\Models\Message
     *
     * @throws \App\Modules\Message\RecordNotFoundException
     */
    public function find($id);

    /**
     * Create a new item.
     *
     * @param  array $data
     *
     * @return \App\Modules\Message\Models\Message|null
     * @throws \RuntimeException
     */
    public function create(array $data);

    /**
     * Return latest query total items.
     *
     * @return int
     */
    public function getTotal();
}
