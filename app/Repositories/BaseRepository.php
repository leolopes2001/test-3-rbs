<?php 

namespace App\Repositories;

use CodeIgniter\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->findAll();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function save(array $data)
    {
        return $this->model->save($data);
    }

    public function update($id, array $data)
    {
        return $this->model->update($id, $data);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }
}
