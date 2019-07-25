<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use ArrayObject;
use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class AfterMiddleware {

    public function handle(Request $request, Closure $next) {
        $response = $next($request);
        // Perform action
        $content = $response->getContent() ? substr($response->getContent(), 0, 200) : '';
        Log::info($request->getRequestUri(), ['response' => $content]);
        //$content = [
        //    'code' => 0,
        //    'data' => json_decode($response->getContent(), true),
        //    'msg'  => '',
        //];
        //$response->setContent($this->morphToJson($content));

        return $response;
    }


}
