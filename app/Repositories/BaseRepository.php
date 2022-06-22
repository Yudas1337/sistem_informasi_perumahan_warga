<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    public $model;

    /**
     * Handle the Getall data event from models.
     *
     * 
     * @return mixed
     */

    public function getAll(): mixed
    {
        return $this->model->all();
    }

    /**
     * Handle store data event to models.
     *
     * 
     * @return mixed
     */

    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * Handle the get paginated data event from models.
     *
     * @param int $pagination
     * 
     * @return mixed
     */

    public function getPaginated(int $pagination): mixed
    {
        return $this->model->paginate($pagination);
    }

    /**
     * Handle get the specified data by id from models.
     *
     * @param string $id
     * 
     * @return mixed
     */

    public function show(string $id): mixed
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Handle show method and update data instantly from models.
     *
     * @param string $id
     * @param array $data
     * 
     * @return mixed
     */

    public function update(string $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param string $id
     * 
     * @return mixed
     */

    public function destroy(string $id): mixed
    {
        return $this->show($id)->delete($id);
    }

    /**
     * Handle relationship from models.
     *
     * @param array $relationship
     * @param mixed $options
     * @param int $pagination
     * 
     * @return mixed
     */

    public function withRelationship(array $relationship, mixed $options = 'get', int $pagination = null): mixed
    {
        $query = $this->model->with($relationship);

        switch ($options) {
            case 'get':
                $query = $query->get();
                break;
            case 'paginate':
                $query = $query->paginate($pagination);
                break;
        }

        return $query;
    }
}
