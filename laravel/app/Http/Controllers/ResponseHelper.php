<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \Exception;
use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    const ErrorMessageParamName = 'error_message';
    const ErrorTypeParamName = 'error_type';
    const ErrorTypeBadRequest = 'Bad request';

    public static function BadRequestError($errorMessage) : JsonResponse
    {
        return response()->json(
            [
                ResponseHelper::ErrorMessageParamName => $errorMessage,
                ResponseHelper::ErrorTypeParamName => ResponseHelper::ErrorTypeBadRequest
            ], 400);
    }

    public static function InternalServerError($exception) : JsonResponse
    {
        return response()->json(
            [
                ResponseHelper::ErrorMessageParamName => $exception->getMessage(),
                ResponseHelper::ErrorTypeParamName => get_class($exception)
            ], 500);
    }
}
