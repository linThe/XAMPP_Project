<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 13/02/2019
 * Time: 08:59
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code ;
    private $msg ;
    private $error_code ;
    //错误页面的URL

    //所有未处理的异常都会经过render渲染处理返回客户端
//        public function render(Exception $e)
//        {
//            if ($e instanceof BannerMissException){
//                $this->code = $e->code ;
//                $this->msg = $e->msg ;
//                $this->error_code = $e->errorCode ;
//            }else{
//                $this->code = '500' ;
//                $this->msg = '服务器内部错误' ;
//                $this->error_code = 999 ;
//
//                $this->recordErrorLog($e) ;
//            }
//
//            $request = Request::instance() ;
//            $result = [
//                'msg' => $this->msg ,
//                'error_code' => $this->error_code,
//                'request_url' => $request->url()
//            ];
//            return json($result,$this->code) ;
//        }

        public function recordErrorLog(Exception $e){
            //在config内关闭日志后不会生成日志，需要自己重新开启日志系统
            Log::init([
                'type' => 'File',
                'path' => LOG_PATH,
                'level' => ['error'] //消息级别，见tp手册，这里代表大于等于error级别的消息
            ]);
            Log::record($e->getMessage(),'error') ;
        }
}
































