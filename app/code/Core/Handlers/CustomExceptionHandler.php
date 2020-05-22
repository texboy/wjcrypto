<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Handlers;

use Core\Validation\ValidationException;
use Exception;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Handlers\IExceptionHandler;

/**
 * Class CustomExceptionHandler
 * @package Wjcrypto\Router\Handlers
 */
class CustomExceptionHandler implements IExceptionHandler
{
    /**
     * @param Request $request
     * @param Exception $error
     * @throws Exception
     */
    public function handleError(Request $request, Exception $error): void
    {
        if ($error instanceof ValidationException) {
            $validationExceptions = $error->getErrors();
            $errorMessages = [];
            foreach ($validationExceptions as $exception) {
                $errorMessages[] = [
                    'error' => $exception->getMessage(),
                    'code' => $exception->getCode(),
                ];
            }
            response()->httpCode(420)->json([
                "ValidationException:" => $errorMessages
            ]);
        } elseif ($error instanceof NotFoundHttpException) {
            response()->httpCode($error->getCode())->json([
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ]);
        } else {
            response()->json([
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ]);
        }



        throw $error;
    }
}
