<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponseTrait 
{

  /**
   * Send success response
   * @param string $message
   * @param $data
   * @param int $statusCode
   * @return JsonResponse
   */
  public function successResponse(string $message, $data = [], int $statusCode = Response::HTTP_OK)
  {
    return response()->json([
      'message' => $message,
      'data'    => $data,
      'success' => true,
    ], $statusCode);
  }

    /**
   * Send failure response
   * @param string $message
   * @param array $data
   * @param int $statusCode
   * @return JsonResponse
   */
  public function failureResponse(string $message = '', array $data = [], int $statusCode = Response::HTTP_NOT_FOUND)
  {
    return response()->json([
      'message' => $message,
      'data'    => $data,
      'success' => false,
    ], $statusCode);
  }
}