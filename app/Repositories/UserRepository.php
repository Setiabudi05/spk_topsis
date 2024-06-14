<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;

class UserRepository extends RepositoryAbstract
{

    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * get all data as query
     *
     * @return Collection
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * get all data
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * get all data order by created at desc
     *
     * @return Collection
     */
    public function getLatest()
    {
        return $this->model->latest()->get();
    }

    /**
     * get all data order by created at desc
     *
     * @param string $column
     * @param string $method
     * @return Collection
     */
    public function getOrderBy(string $column, string $method = 'asc')
    {
        return $this->model->orderBy($column, $method)->get();
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        $user = $this->model->create($data);
        return $user;
    }

    /**
     * store data to db
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data)
    {
        return $this->create($data);
    }

    /**
     * find data by id
     *
     * @param int $id
     * @return Model
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * update data by id
     *
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update(array $data, $enc_id)
    {
        $model = $this->find(Crypt::decrypt($enc_id));
        if ($model) {
            $model->update($data);
            return $model;
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Model
     */
    public function delete(int $id)
    {
        $model = $this->findOrFail($id);
        if ($model) {
            return $model->delete();
        }
        return 0;
    }

    /**
     * delete data by id
     *
     * @param int $id
     * @return Model
     */
    public function destroy(int $id)
    {
        return $this->delete($id);
    }
}
