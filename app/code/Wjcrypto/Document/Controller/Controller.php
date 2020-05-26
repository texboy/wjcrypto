<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Controller;

use Core\Model\AccessLogger;
use Psr\Log\LogLevel;
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
     * @var AccessLogger
     */
    private $accessLogger;

    /**
     * Controller constructor.
     * @param DocumentTypeRepository $documentTypeRepository
     * @param AccessLogger $accessLogger
     */
    public function __construct(
        DocumentTypeRepository $documentTypeRepository,
        AccessLogger $accessLogger
    ) {
        $this->documentTypeRepository = $documentTypeRepository;
        $this->accessLogger = $accessLogger;
    }


    /**
     * @return string|null
     */
    public function getTypes(): ?string
    {
        $types =  $this->transactionTypeRepository->getAll()->toArray();
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json(
            $types
        );
    }
}
