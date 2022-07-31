<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
    }

    public function sendResponse($result, $message, $cookie = null)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        $response = response()->json($response, 200);
        if (!is_null($cookie)) {
            $response = $response->withCookie($cookie);
        }

        return $response;
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
