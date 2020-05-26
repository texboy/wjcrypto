<?php /** @noinspection PhpComposerExtensionStubsInspection */

/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Core\Handlers;

use Core\Model\ErrorLogger;
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
     * @var ErrorLogger
     */
    private $errorLogger;

    /**
     * CustomExceptionHandler constructor.
     * @param ErrorLogger $errorLogger
     */
    public function __construct(ErrorLogger $errorLogger)
    {
        $this->errorLogger = $errorLogger;
    }

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
                $errorMessages[] =  [
                    'error' => $exception->getMessage(),
                    'code' => $errorCode
                ];
            }
        } elseif ($error instanceof NotFoundHttpException) {
            $errorCode = 404;
            $errorMessages = [
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ];
        } else {
            $errorCode = $error->getCode();
            $errorMessages = [
                'error' => $error->getMessage(),
                'code' => $error->getCode(),
            ];
        }

        $this->errorLogger->error(json_encode([
            'error: ' => $errorMessages,
            'code: ' => $errorCode,
            'stacktrace: ' => $error->getTraceAsString()
        ]));

        response()->httpCode($errorCode)->json(
            $errorMessages
        );

        throw $error;
    }
}
