<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Model;

use Exception;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $entity;

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function getById(int $id, array $relationships = []): Model
    {
        $entity = $this->entity::with($relationships)->find($id);
        if (is_null($entity)) {
            throw new Exception('Entity with id = ' . $id . ' doest not exist', 400);
        }
        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function getAll(array $relationships = []): Collection
    {
        return $this->entity::with($relationships)->get();
    }

    /**
     * @inheritDoc
     */
    public function save(array $data): Model
    {
        return $this->entity::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): bool
    {
        return $this->entity::find($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): bool
    {
        $this->entity::find($id)->delete();
    }

    /**
     * @inheritDoc
     */
    public function getDatabaseConnection(): ConnectionInterface
    {
        return $this->entity->getConnection();
    }
}