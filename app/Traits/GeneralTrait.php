<?php

namespace App\Traits;

trait GeneralTrait
{
    public function sendResponse($data, $message) {
        $response = [
            'status' => 'success',
            'data' => $data,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
    public function returnError($error,$errorMessage=[], $code =404) {
        $response = [
            'status' => 'faild',
            'data' => $error,
        ];
        if (!empty($errorMessage)) :
            $response['data'] = $errorMessage;
        endif;

        return response()->json($response, $code);
    }


}
