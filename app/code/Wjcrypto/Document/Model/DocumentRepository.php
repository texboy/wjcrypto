<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class DocumentRepository
 * @package Wjcrypto\Document\Model
 */
class DocumentRepository implements DocumentRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function getDocument(int $id): Document
    {
        return Document::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getAllDocuments(): Collection
    {
        return Document::all();
    }

    /**
     * @inheritDoc
     */
    public function saveDocument(array $documentData): int
    {
        return Document::create($documentData)->document_id;
    }

    /**
     * @inheritDoc
     */
    public function updateDocument(int $id, array $documentData): bool
    {
        return Document::find($id)->update($documentData);
    }

    /**
     * @inheritDoc
     */
    public function deleteDocument(int $id): bool
    {
        return Document::find($id)->delete();
    }
}