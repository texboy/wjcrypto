<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Transaction\Controller;

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
     * Controller constructor.
     * @param TransactionTypeRepository $transactionTypeRepository
     */
    public function __construct(TransactionTypeRepository $transactionTypeRepository)
    {
        $this->transactionTypeRepository = $transactionTypeRepository;
    }


    /**
     * @return string|null
     */
    public function getTypes(): ?string
    {
        return response()->httpCode(200)->json(
            $this->transactionTypeRepository->getAll()->toArray()
        );
    }
}
