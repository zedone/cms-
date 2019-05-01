<?php
# @Author: huang longpan
# @Date:   2019-03-12T19:18:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-14T20:13:12+08:00

namespace app\admin\model;
use think\Model;

class Adpos extends Model
{
    public static function init()
    {
    //删除之前先删除掉上传的图片
        Adpos::event('before_delete', function ($data) {
            $ad=db('ad')->where('adid',$data['id'])->select();
            if($ad){
                foreach ($ad as $k => $v) {
                    $imgSrc=DELAD.$v['img'];
                    if(file_exists($imgSrc)){
                        @unlink($imgSrc);
                    }
                }
                db('ad')->where('adid',$data['id'])->delete();

                //
                //
                // 旧方案
                //如果该广告位下有广告数据
                //循环判断，每一条广告
                //如果广告类型为：1单图广告，则删除该广告的图片
                //如果广告类型为：2轮播图广告，这查询轮播图广告并循环删除该轮播图广告的图片及相应数据库的数据
                //最后删除该广告位下的所有该广告数据
                // foreach ($ad as $k => $v) {
                //     if($v['type']==1){
                //         $imgSrc=DELAD.$v['img'];
                //         if(file_exists($imgSrc)){
                //             @unlink(DELAD.$v['img']);
                //         }
                //     }
                //     if($v['type']==2){
                //         $adcarousel=db('adcarousel')->where('ad_id',$v['id'])->select();
                //         if($adcarousel){
                //             foreach ($adcarousel as $k2 => $v2) {
                //                 $imgSrc=DELAD.$v2['fimg'];
                //                 if(file_exists($imgSrc)){
                //                     @unlink($imgSrc);
                //                 }
                //             }
                //             //这里要注意是$v，不是$v2
                //             db('adcarousel')->where('ad_id',$v['id'])->delete();
                //         }
                //     }
                // }
                //db('ad')->where('adid',$data['id'])->delete();
            }
        });


    }


}
