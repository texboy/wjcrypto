<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Customer\Controller;

use Pecee\Controllers\IResourceController;
use Psr\Log\LoggerInterface;
use Wjcrypto\Customer\Model\Customer;
use Wjcrypto\Document\Model\Document;

/**
 * Class ApiController
 * @package Wjcrypto\User\Controller
 */
class ApiController implements IResourceController{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Document
     */
    private $document;

    /**
     * ApiController constructor.
     * @param Customer $customer
     * @param Document $document
     */
    public function __construct(Customer $customer, Document $document)
    {
        $this->customer = $customer;
        $this->document = $document;
    }

    /**
     * @inheritDoc
     */
    public function index(): ?string
    {
        return response()->json([
           "customer" => "customer"
        ]);
    }

    /**
     * @inheritDoc
     */
    public function show($id): ?string
    {
        /** @var Customer $customer */
        $customer = Customer::find($id);
        $test = $customer->user->toArray();
        return response()->json([
            $customer->toArray(),
            $customer->documents->toArray()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function store(): ?string
    {


        $this->customer->getConnection()->transaction(
            function () {
                $customer = input()->all()['customer'];
                $this->customer->fill($customer);
                $this->customer->save();
                $customerId = $this->customer->customer_id;
                foreach ($customer['documents'] as $document) {
                    $document['customer_id'] = $customerId;
                    $this->document->fill($document);
                    $this->document->save();
                }
            }
        );
        return response()->json([
            "customer" => "customer"
        ]);
    }

    /**
     * @inheritDoc
     */
    public function create(): ?string
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function edit($id): ?string
    {
       //TODO
    }

    /**
     * @inheritDoc
     */
    public function update($id): ?string
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function destroy($id): ?string
    {
        // TODO: Implement destroy() method.
    }
}
