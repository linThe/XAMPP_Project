<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 12/02/2019
 * Time: 17:11
 */

namespace app\api\validate;

use think\Validate ;
class IDMustBePostiveint extends BaseValidate
{
        protected $rule = [
            'id' => 'require|isPostiveInteger',
        ];

        protected function isPostiveInteger($value, $rule = '', $data = '', $field = ''){
            if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0){  //字符串 + 0 ：转换成字符变量
                return true ;
            }else{
                return $field."必须是正整数";  //自定义错误信息
            }
        }
}