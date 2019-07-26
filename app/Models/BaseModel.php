<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;
use App\Models\RepairManage\RepairUser;
use App\Models\Manage\Manage;

class BaseModel extends Model
{

    const DELETED_YES = 1;
    const DELETED_NO = 0;

    const ENABLED_YES = 1;
    const ENABLED_NO = 0;

    use ProvidesConvenienceMethods;

    protected $guarded = ['id'];
    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 此模型的连接名称。
     *
     * @var string
     */


    protected $connection = 'mysql';

    /**
     * 此模型返回的错误信息数组。
     *
     * @var array
     */
    protected $errorMsg = [];


    protected function setMessages($errorMsg) {
        $this->errorMsg = array_merge($this->errorMsg, $errorMsg);
        return false;
    }

    public function getMessages() {
        return $this->errorMsg;
    }

    public function validate($all, $rules = [], $messages = [], $attributes = [])
    {
        $validator = $this->getValidationFactory()->make($all, $rules, $messages, $attributes);

        if ($validator->fails()) {
            $this->setMessages($validator->errors()->getMessages());
            return false;
        }
        return true;
    }

    public static function getAdminName($adminId)
    {
        if ($adminId < 100000) {
            $admin_name = Manage::where('adminId', $adminId)->value('name');
        }
        else {
            $admin_name = RepairUser::where('id', $adminId)->value('name');
        }
        if(empty($admin_name)){
            $admin_name="";
        }
        return $admin_name;
    }

    /**
     * 数组对象取值相关 - 避免出错
     */
    public function getIndex($arr, $key, $default = '') {

        return isset($arr[$key]) ? $arr[$key] : $default;
    }
}
