<?php

namespace App\Modules\Message;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use RuntimeException;

class MessageRepository implements Repository
{
    /**
     * Model.
     *
     * @var \App\Modules\Message\Models\Message
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
            'search' => '',
        ], $params);

        $model = $this->createModel();

        if (empty($page)) {
            $page = 1;
        }

        $fromSql = '(';
        $fromSql .= 'SELECT `id` FROM `'.$model->getTable().'`';

        $useWhere = false;
        $isUseWhere = false;

        if (! empty($params['search'])) {
            $useWhere = true;
        }

        if ($useWhere) {
            $fromSql .= ' WHERE';
        }

        if (! empty($params['search'])) {
            if ($isUseWhere) {
                $fromSql .= ' AND';
            }

            $fromSql .= '(';
            $fromSql .= ' `title` LIKE "%'.$params['search'].'%"';
            $fromSql .= ' OR `sender` LIKE "%'.$params['search'].'%"';
            $fromSql .= ' OR `phone` LIKE "%'.$params['search'].'%"';
            $fromSql .= ' OR `email` LIKE "%'.$params['search'].'%"';
            $fromSql .= ')';

            $isUseWhere = true;
        }

        $fromSql .= ' ORDER BY `created_at` DESC';

        if ($limit > 0) {
            $fromSql .= ' limit '.$limit.' offset '.($page - 1) * $limit;
        }

        $fromSql .= ') o';

        $query = $model->select($model->getTable().'.id');

        if (! empty($params['search'])) {
            $query->where(function ($query) use ($model, $params) {
                $query->where($model->getTable().'.title', 'LIKE', '%'.$params['search'].'%')
                    ->orWhere($model->getTable().'.sender', 'LIKE', '%'.$params['search'].'%')
                    ->orWhere($model->getTable().'.phone', 'LIKE', '%'.$params['search'].'%')
                    ->orWhere($model->getTable().'.email', 'LIKE', '%'.$params['search'].'%');
            });
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
     * Create a new instance of the model.
     *
     * @return \App\Modules\Message\Models\Message
     */
    private function createModel()
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
