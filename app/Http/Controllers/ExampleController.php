<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\BaseModel;
use App\Http\Controllers\Controller;
use App\Models\Serviceplat\RepairEngineers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



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
        $kk=in_array($runtime = env('RUN_TIME', 'there is no RUN_TIME'), ['local', 'dev', 'test', 'uat', 'onl']);
        $id= RepairEngineers::query()->where('id',1)->value('id');
        return $this->success(['result' => $kk]);
    }

    //
}
