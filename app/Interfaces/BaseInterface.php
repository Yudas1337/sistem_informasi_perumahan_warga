<?php

namespace App\Interfaces;

interface BaseInterface
{
    /**
     * Handle the Getall data event from models.
     *
     * 
     * @return mixed
     */

    public function getAll(): mixed;

    /**
     * Handle store data event to models.
     *
     * 
     * @return mixed
     */

    public function store(array $data): mixed;

    /**
     * Handle the get paginated data event from models.
     *
     * @param int $pagination
     * 
     * @return mixed
     */

    public function getPaginated(int $pagination): mixed;

    /**
     * Handle get the specified data by id from models.
     *
     * @param string $id
     * 
     * @return mixed
     */

    public function show(string $id): mixed;

    /**
     * Handle show method and update data instantly from models.
     *
     * @param string $id
     * @param array $data
     * 
     * @return mixed
     */

    public function update(string $id, array $data): mixed;

    /**
     * Handle show method and delete data instantly from models.
     *
     * @param string $id
     * 
     * @return mixed
     */

    public function destroy(string $id): mixed;

    /**
     * Handle relationship from models.
     *
     * @param array $relationship
     * @param mixed $options
     * @param int $pagination
     * 
     * @return mixed
     */

    public function withRelationship(array $relationship, mixed $options = 'get', int $pagination = null): mixed;
}
