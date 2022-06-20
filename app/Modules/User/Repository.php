<?php

namespace App\Modules\User;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface Repository
{
    /**
     * Return users.
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
     * @return \App\Modules\User\Models\User
     *
     * @throws \App\Modules\User\RecordNotFoundException
     */
    public function findBy(array $params);

    /**
     * Create a new item.
     *
     * @param  array $data
     *
     * @return \App\Modules\User\Models\User|null
     *
     * @throws \RuntimeException
     */
    public function create(array $data);

    /**
     * Update User meta.
     *
     * @param  int $userId
     * @param  string  $key
     * @param  string  $value
     *
     * @return \App\Modules\User\Models\UserMeta|null
     */
    public function updateMeta($userId, $key, $value);

    /**
     * Find a item meta by params.
     *
     * @param  array $params
     *
     * @return \App\Modules\User\Models\UserMeta
     *
     * @throws \App\Modules\User\RecordNotFoundException
     */
    public function findMetaBy(array $params);

    /**
     * Find a group by params.
     *
     * @param  array $params
     *
     * @return \App\Modules\User\Models\Group
     *
     * @throws \App\Modules\User\RecordNotFoundException
     */
    public function findGroupBy(array $params);

    /**
     * Add a user to a group.
     *
     * @param  int $userId
     * @param  int $groupId
     *
     * @return \App\Modules\User\Models\UserGroup
     *
     * @throws \RuntimeException
     */
    public function addToGroup($userId, $groupId);

    /**
     * Remove a user from a group.
     *
     * @param  int $userId
     * @param  int $groupId
     *
     * @return bool
     */
    public function removeFromGroup($userId, $groupId);

    /**
     * Return latest query total items.
     *
     * @return int
     */
    public function getTotal();
}
