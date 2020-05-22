<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class DocumentTypeRepository
 * @package Wjcrypto\Document\Model
 */
class DocumentTypeRepository implements DocumentTypeRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getDocumentType(int $id): DocumentType
    {
        return DocumentType::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllDocumentTypes(): Collection
    {
        return DocumentType::all();
    }

    /**
     * @inheritDoc
     */
    public function saveDocumentType(array $documentData): int
    {
        return DocumentType::create($documentData);
    }

    /**
     * @inheritDoc
     */
    public function updateDocumentType(int $id, array $documentData): bool
    {
        return DocumentType::find($id)->update($documentData);
    }

    /**
     * @inheritDoc
     */
    public function deleteDocumentType(int $id): bool
    {
        return DocumentType::find($id)->delete();
    }
}