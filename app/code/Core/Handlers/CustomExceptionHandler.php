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
        $errorMessages = [];
        $errorCode = 0;
        if ($error instanceof ValidationException) {
            $validationExceptions = $error->getErrors();
            $errorCode = 400;
            foreach ($validationExceptions as $exception) {
                $messages[] =  [ 'error' => $exception->getMessage()];
            }
            $errorMessages['validationException'] = $messages;
            $errorMessages['code'] = $errorCode;
        } elseif ($error instanceof NotFoundHttpException) {
            $errorCode = 404;
            $errorMessages = [
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ];
        } else {
            $errorCode = 400;
            $errorMessages = [
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ];
        }
        response()->httpCode($errorCode)->json([
            $errorMessages
        ]);

        throw $error;
    }
}
