<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 13/02/2019
 * Time: 09:08
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404 ;
    public $msg = 'request banner does not exists' ;
    public $errorCode = '40000' ;
}