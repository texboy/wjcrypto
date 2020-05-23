<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Core\Model\BaseRepository;

/**
 * Class DocumentTypeRepository
 * @package Wjcrypto\Document\Model
 */
class DocumentTypeRepository extends BaseRepository
{

    /**
     * DocumentTypeRepository constructor.
     * @param DocumentType $documentType
     */
    public function __construct(DocumentType $documentType)
    {
        $this->entity = $documentType;
    }
}