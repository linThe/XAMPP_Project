<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 12/02/2019
 * Time: 16:19
 */

namespace app\api\validate;

use think\Validate ;
class TestValidate extends Validate
{
    protected $rule = [

        'name' => 'require|max:10',  //要求传过来的name对应的值不能为空且长度最大为10
        'mail' => 'email' // 符合内置规则邮箱验证
    ];
}