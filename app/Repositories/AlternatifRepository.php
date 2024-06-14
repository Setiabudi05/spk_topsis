<?php

namespace App\Repositories;

use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;

class AlternatifRepository extends RepositoryAbstract
{

    protected $model;

    public function __construct()
    {
        $this->model = new Alternatif();
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
        return $this->model->create($data);
    }
    public function updateOrCreate(array $user, $data)
    {
        return $this->model->updateOrCreate($user, $data);
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
    public function findOrFail(string $enc_id)
    {
        return $this->model->findOrFail(Crypt::decrypt($enc_id));
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
    public function delete(int $enc_id)
    {
        $id = Crypt::decrypt($enc_id);
        $model = $this->findOrFail($id);
        if ($model) {
            return $model->delete();
        }
        return 0;
    }
    public function enc_delete(string $enc_id)
    {
        // $id = Crypt::decrypt($enc_id);
        // dd('s');
        $model = $this->findOrFail($enc_id);
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
