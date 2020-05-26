<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Controller;

use Core\Model\AccessLogger;
use Pecee\Http\Request;
use Psr\Log\LogLevel;
use Wjcrypto\Transaction\Model\TransactionTypeRepository;

/**
 * Class Controller
 * @package Wjcrypto\Customer\Controller
 */
class Controller
{

    /**
     * @var TransactionTypeRepository
     */
    private $transactionTypeRepository;

    /**
     * @var AccessLogger
     */
    private $accessLogger;

    /**
     * Controller constructor.
     * @param TransactionTypeRepository $transactionTypeRepository
     * @param AccessLogger $accessLogger
     */
    public function __construct(
        TransactionTypeRepository $transactionTypeRepository,
        AccessLogger $accessLogger
    ) {
        $this->transactionTypeRepository = $transactionTypeRepository;
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
