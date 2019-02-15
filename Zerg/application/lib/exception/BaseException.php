<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 13/02/2019
 * Time: 09:02
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    //描述错误信息：错误码，错误信息，当前URL
    //HTTP 状态码 404 200
    public $code = 400 ;
    //错误具体信息
    public $msg = 'param error!';

    //自定义错误码
    public $errorCode = '10000' ;
}