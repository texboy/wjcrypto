<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Controller;

use Wjcrypto\Document\Model\DocumentTypeRepository;

/**
 * Class Controller
 * @package Wjcrypto\Customer\Controller
 */
class Controller
{
    /**
     * @var DocumentTypeRepository
     */
    private $documentTypeRepository;

    /**
     * Controller constructor.
     * @param DocumentTypeRepository $documentTypeRepository
     */
    public function __construct(DocumentTypeRepository $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }

    /**
     * @return string|null
     */
    public function getTypes(): ?string
    {
        return response()->httpCode(200)->json(
            $this->documentTypeRepository->getAll()->toArray()
        );
    }
}
