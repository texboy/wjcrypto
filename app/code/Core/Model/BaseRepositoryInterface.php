<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Model;

use Exception;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 * @package Core\Model
 */
interface BaseRepositoryInterface
{
    /**
     * @param Model
     */

    /**
     * @param int $id
     * @param array $relationships
     * @return Model
     */
    public function getById(int $id, array $relationships = []): Model;

    /**
     * @param array $relationships
     * @return Collection
     */
    public function getAll(array $relationships = []): Collection;

    /**
     * @param array $data
     * @return Model
     */
    public function save(array $data): Model;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return ConnectionInterface
     */
    public function getDatabaseConnection(): ConnectionInterface;
}
