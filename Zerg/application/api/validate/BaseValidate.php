<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 12/02/2019
 * Time: 19:13
 */

namespace app\api\validate;

use think\Exception;
use think\Request;
use think\Validate ;
class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance() ;
        $params = $request->param() ;

        $result = $this->batch()->check($params) ;
        if (!$result){
            $error = $this->error ;
            throw new Exception(implode($error)) ;
        }else{
            return true ;
        }
    }
}