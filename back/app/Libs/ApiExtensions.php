<?php

namespace App\Libs;

class ApiExtensions
{

    public static function findByColumns($class, $columns, $value, $strict = false)
    {
        $query = $class::query();
        $resultResponse = new ResultResponse();

        try {
            foreach ($columns as $column) {
                if ($strict)
                    $query->orWhere($column, $value);
                else
                    $query->orWhere($column, 'LIKE', '%' . $value . '%');
            }

            $result = $query->paginate();

            ApiExtensions::setResultResponse(
                $resultResponse,
                $result,
                ResultResponse::SUCCESS_CODE,
                ResultResponse::TXT_SUCCESS_CODE
            );
        } catch (\Exception $e) {
            ApiExtensions::setResultResponse(
                $resultResponse,
                "",
                ResultResponse::ERROR_ELEMENT_NOT_FOUND_CODE,
                ResultResponse::TXT_ERROR_ELEMENT_NOT_FOUND_CODE
            );
        }
        return $resultResponse;
    }

    public static function setResultResponse($resultResponse, $data, $statusCode, $message)
    {
        $resultResponse->setData($data);
        $resultResponse->setStatusCode($statusCode);
        $resultResponse->setMessage($message);
    }
}
