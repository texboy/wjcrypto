<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Core\Model\BaseRepository;

/**
 * Class DocumentRepository
 * @package Wjcrypto\Document\Model
 */
class DocumentRepository extends BaseRepository
{
    /**
     * DocumentRepository constructor.
     * @param Document $document
     */
    public function __construct(Document $document)
    {
        $this->entity = $document;
    }
}