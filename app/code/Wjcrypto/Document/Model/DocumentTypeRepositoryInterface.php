<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Exception;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface DocumentTypeRepositoryInterface
 * @package Wjcrypto\Document\Model
 */
interface DocumentTypeRepositoryInterface
{
    /**
     * @param int $id
     * @return DocumentType
     */
    public function getDocumentType(int $id): DocumentType;

    /**
     * @return Collection
     */
    public function getAllDocumentTypes(): Collection;

    /**
     * @param array $documentData
     * @return int
     */
    public function saveDocumentType(array $documentData): int;

    /**
     * @param int $id
     * @param array $documentData
     * @return bool
     */
    public function updateDocumentType(int $id, array $documentData): bool;

    /**
     * @param int $id
     * @throws Exception
     * @return bool
     */
    public function deleteDocumentType(int $id): bool;
}
