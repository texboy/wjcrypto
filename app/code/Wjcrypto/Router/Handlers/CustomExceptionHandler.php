<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Router\Handlers;

use Exception;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Handlers\IExceptionHandler;
use Wjcrypto\Core\Model\ValidationException;

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
        if ($request->getUrl()->contains('/api')) {
            if ($error instanceof ValidationException) {
                $validationExceptions = $error->getErrors();
                $errorMessages = [];
                foreach ($validationExceptions as $exception) {
                    $errorMessages[] = [
                        'error' => $exception->getMessage(),
                        'code' => $exception->getCode(),
                    ];
                }
                response()->json([
                    "ValidationException:" => $errorMessages
                ]);
            } else {
                response()->json([
                    'error' => $error->getMessage(),
                    'code' => $error->getCode(),
                ]);
            }
        }

        if ($error instanceof NotFoundHttpException) {
            $request->setRewriteCallback('\Wjcrypto\Router\Controller\Index@notFound');
            return;
        }

        throw $error;
    }
}
