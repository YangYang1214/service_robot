<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\BaseModel;
use App\Http\Controllers\Controller;
use App\Models\Serviceplat\RepairEngineers;
class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function test(){

        return $this->success(['result' => '成功！']);
    }

    //
}
