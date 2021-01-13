<?php
/**
 * Api响应类
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:30
 */

namespace App\Libs\Response;

use App\Libs\ApiResponse\DataFormats\JsonResponse;
use App\Libs\Response\Enums\CodeBaseEnum;

class ApiResponse
{
    public function success($data = null, int $httpCode = 200, array $headers = [])
    {
        $resp = new JsonResponse($data);

        return response()->json($resp, $httpCode, $headers);
    }

    public function error(string $message = '', $data = null, int $code = CodeBaseEnum::INTERNAL_ERROR, int $httpCode = 500, array $headers = [])
    {
        $resp = new JsonResponse($data, $message, $code);

        return response()->json($resp, $httpCode, $headers);
    }
}
