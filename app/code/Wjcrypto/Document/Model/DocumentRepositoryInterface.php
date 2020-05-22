<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface DocumentRepositoryInterface
 * @package Wjcrypto\Account\Model
 */
interface DocumentRepositoryInterface
{
    /**
     * @param int $id
     * @return Document
     */
    public function getDocument(int $id): Document;

    /**
     * @return Collection
     */
    public function getAllDocuments(): Collection;

    /**
     * @param array $documentData
     * @return int
     */
    public function saveDocument(array $documentData): int;

    /**
     * @param int $id
     * @param array $documentData
     * @return bool
     */
    public function updateDocument(int $id, array $documentData): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function deleteDocument(int $id): bool;
}
