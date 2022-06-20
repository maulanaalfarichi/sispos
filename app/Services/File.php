<?php

namespace App\Services;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Modules\File\Repository;

class File extends Service
{
    /**
     * Search items.
     *
     * @param  array   $params
     * @param  int $page
     * @param  int $limit
     *
     * @return array
     * @throws \RuntimeException
     */
    public function search(array $params = [], $page = 1, $limit = 10)
    {
        $repository = $this->getFileRepository();
        $collection = $repository->search($params, $page, $limit);

        return [$collection, $repository->getTotal()];
    }

    /**
     * Create a item.
     *
     * @param  array  $data
     *
     * @return \App\Modules\File\Models\File
     * @throws \RuntimeException
     */
    public function create(array $data)
    {
        return $this->getFileRepository()->create($data);
    }

    /**
     * Return File instance.
     *
     * @return \App\Modules\File\Repository
     */
    private function getFileRepository()
    {
        return app(Repository::class);
    }
}
