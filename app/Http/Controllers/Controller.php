<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function success($data = [], $msg = '') {
        return [
            'code' => 1,
            'msg'  => $msg,
            'data' => $data,
        ];
    }

    public function fail($code = -1, $data = [], $msg = '') {
        return [
            'code' => $code,
            'msg'  => !$msg ? config('errorcode')[(int) $code] : $msg,
            'data' => $data,
        ];
    }

    /**
     * Validate the given request with the given rules.
     * @param array $request
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @throws \Exception
     */
    public function validated(array $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request, $rules, $messages, $customAttributes);

        if ($validator->fails()) {
//            throw new \Exception(json_encode($validator->errors()->messages()), -1);
        }
    }
}
