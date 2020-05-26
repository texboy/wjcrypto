<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Controller;

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
     * Controller constructor.
     * @param CustomerTypeRepository $customerTypeRepository
     */
    public function __construct(CustomerTypeRepository $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
    }

    /**
     * @return string|null
     */
    public function getTypes(): ?string
    {
        return response()->httpCode(200)->json(
            $this->customerTypeRepository->getAll()->toArray()
        );
    }
}
