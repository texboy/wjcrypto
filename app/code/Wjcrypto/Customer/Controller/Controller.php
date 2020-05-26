<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Controller;

use Core\Model\AccessLogger;
use Psr\Log\LogLevel;
use Wjcrypto\Customer\Model\CustomerTypeRepository;

/**
 * Class Controller
 * @package Wjcrypto\Customer\Controller
 */
class Controller
{
    /**
     * @var CustomerTypeRepository
     */
    private $customerTypeRepository;

    /**
     * @var AccessLogger
     */
    private $accessLogger;

    /**
     * Controller constructor.
     * @param CustomerTypeRepository $customerTypeRepository
     * @param AccessLogger $accessLogger
     */
    public function __construct(
        CustomerTypeRepository $customerTypeRepository,
        AccessLogger $accessLogger
    ) {
        $this->customerTypeRepository = $customerTypeRepository;
        $this->accessLogger = $accessLogger;
    }


    /**
     * @return string|null
     */
    public function getTypes(): ?string
    {
        $types =  $this->customerTypeRepository->getAll()->toArray();
        $this->accessLogger->log(LogLevel::INFO, '');
        return response()->httpCode(200)->json(
            $types
        );
    }
}
