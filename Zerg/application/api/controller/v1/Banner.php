<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 12/02/2019
 * Time: 15:39
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveint;
use app\api\model\Banner as BannerModel ;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
{
    //TODO：先构建架构而后填充
    /**
     * 获取指定id的Banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id
     */
    public function getBanner($id){
        //重用思想
        $banner = BannerModel::getBannerByID($id) ;
        if (!$banner)
            throw new Exception('500内部错误') ;
        return $banner;
    }
}