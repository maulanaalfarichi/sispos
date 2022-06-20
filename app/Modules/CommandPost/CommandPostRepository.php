<?php

namespace App\Modules\CommandPost;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use RuntimeException;

class CommandPostRepository implements Repository
{
    /**
     * Model.
     *
     * @var \App\Modules\CommandPost\Models\CommandPost
     */
    protected $model;

    /**
     * Current total query rows.
     *
     * @var int
     */
    protected $total = 0;

    /**
     * Create a new instance.
     *
     * @param string $model
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function search(array $params = [], $page = 1, $limit = 10)
    {
        $params = array_merge([
            'author_id'   => '',
            'area_id'     => '',
            'identifier'  => '',
            'village_id'  => '',
            'title'       => '',
            'is_active'   => -1,
        ], $params);

        $model = $this->createModel();

        if (empty($page)) {
            $page = 1;
        }

        $fromSql = '(';
        $fromSql .= 'SELECT `id` FROM `'.$model->getTable().'`';

        $useWhere = false;
        $isUseWhere = false;

        if (! empty($params['author_id'])
         || ! empty($params['area_id'])
         || ! empty($params['identifier'])
         || ! empty($params['village_id'])
         || ! empty($params['title'])
         || $params['is_active'] > -1) {
            $useWhere = true;
        }

        if ($useWhere) {
            $fromSql .= ' WHERE';
        }

        if (! empty($params['author_id'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= ' `author_id` = '.$params['author_id'];

            $isUseWhere = true;
        }

        if (! empty($params['area_id'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= ' `area_id` = '.$params['area_id'];

            $isUseWhere = true;
        }

        if (! empty($params['identifier'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= ' `identifier` = "'.$params['identifier'].'"';

            $isUseWhere = true;
        }

        if (! empty($params['village_id'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            if (is_array($params['village_id'])) {
                $fromSql .= ' `village_id` IN ("'.implode('","', $params['village_id']).'")';
            } else {
                $fromSql .= ' `village_id` = "'.$params['village_id'].'"';
            }

            $isUseWhere = true;
        }

        if (! empty($params['title'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= ' `title` LIKE "%'.$params['title'].'%"';

            $isUseWhere = true;
        }

        if ($params['is_active'] > -1) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= ' `is_active` = '.$params['is_active'];

            $isUseWhere = true;
        }

        $fromSql .= ' ORDER BY `created_at` DESC';

        if ($limit > 0) {
            $fromSql .= ' limit '.$limit.' offset '.($page - 1) * $limit;
        }

        $fromSql .= ') o';

        $query = $model->select($model->getTable().'.id');

        if (! empty($params['author_id'])) {
            $query->where($model->getTable().'.author_id', '=', $params['author_id']);
        }

        if (! empty($params['area_id'])) {
            $query->where($model->getTable().'.area_id', '=', $params['area_id']);
        }

        if (! empty($params['identifier'])) {
            $query->where($model->getTable().'.identifier', '=', $params['identifier']);
        }

        if (! empty($params['village_id'])) {
            if (is_array($params['village_id'])) {
                $query->whereIn($model->getTable().'.village_id', $params['village_id']);
            } else {
                $query->where($model->getTable().'.village_id', '=', $params['village_id']);
            }
        }

        if (! empty($params['title'])) {
            $query->where($model->getTable().'.title', 'LIKE', '%'.$params['title'].'%');
        }

        if ($params['is_active'] > -1) {
            $query->where($model->getTable().'.is_active', '=', $params['is_active']);
        }

        $this->total = $query->count();

        $query = $model->newQuery()->select($model->getTable().'.*')
                    ->from($this->getDb()->raw($fromSql))
                    ->join($model->getTable(), $model->getTable().'.id', '=', 'o.id')
                    ->orderBy($model->getTable().'.created_at', 'DESC');

        unset($fromSql);
        unset($model);

        return $query->get();
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(array $params)
    {
        $params = array_merge([
            'id'          => 0,
            'author_id'   => 0,
            'area_id'     => 0,
            'identifier'  => '',
        ], $params);

        $model = $this->createModel();

        $query = $model->newQuery()->select($model->getTable().'.*');

        if (! empty($params['id'])) {
            $query->where($model->getTable().'.id', '=', $params['id']);
        }

        if (! empty($params['author_id'])) {
            $query->where($model->getTable().'.author_id', '=', $params['author_id']);
        }

        if (! empty($params['area_id'])) {
            $query->where($model->getTable().'.area_id', '=', $params['area_id']);
        }

        if (! empty($params['identifier'])) {
            $query->where($model->getTable().'.identifier', '=', $params['identifier']);
        }

        unset($model);

        $item = $query->first();

        if (is_null($item)) {
            throw new RecordNotFoundException('Item not found!');
        }

        return $item;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        $item = $this->createModel()->find($id);

        if (! is_object($item)) {
            throw new RecordNotFoundException('No item found');
        }

        return $item;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $item = $this->createModel();
        $item->fill($data);

        if (! $item->save()) {
            throw new RuntimeException('Failed to create the item');
        }

        return $item;
    }

    /**
     * {@inheritdoc}
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * {@inheritdoc}
     */
    public function createModel()
    {
        return new $this->model;
    }

    /**
     * Create a DB instance.
     *
     * @return mixed
     */
    private function getDb()
    {
        return app('db');
    }
}
