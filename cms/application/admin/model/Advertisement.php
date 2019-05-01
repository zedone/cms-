<?php
# @Author: huang longpan
# @Date:   2019-03-09T21:58:56+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-14T21:25:36+08:00

namespace app\admin\model;
use think\Model;

class Advertisement extends Model
{
    protected $table = 'tp_ad';
    protected $oldimg = true;

    public static function init()
    {
        Advertisement::event('before_insert', function ($date) {
            if($_FILES['img']['tmp_name']){
                   $file=request()->file('img');
                   $info =$file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                   if($info){
                       $imgSrc=$info->getSaveName();
                       $date['img']=$imgSrc;
                   }
               }
           });

       Advertisement::event('before_delete', function ($data) {
           $imgSrc=DELAD.$data['img'];
           if(file_exists($imgSrc)){
               @unlink($imgSrc);
           }
       });
       Advertisement::event('before_update', function ($data) {
           // echo $data;die;
           if($_FILES['img']['tmp_name']){
               //修改广告过程中如果原广告有图片，则要先删除原广告图片
                $imgSrc=DELAD.$data['oldimg'];
                if(file_exists($imgSrc)){
                    @unlink($imgSrc);
                }

                  $file=request()->file('img');
                  $info =$file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                  if($info){
                      $imgSrc=$info->getSaveName();
                      $data['img']=$imgSrc;
                  }
              }else{
                  $data['img']=$data['oldimg'];
              }
       });
   }
            //旧方案
            //如果添加的广告是开启的，这把该广告位下的其他广告隐藏
            // if($date['static']==1){
            //     db('ad')->where('adid',$date['adid'])->data(['static' => '0'])->update();
            // }
            // //单图广告type==1
            // if($date['type']==1){
            //     if($_FILES['img']['tmp_name']){
            //         $file=request()->file('img');
            //         $info =$file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
            //         if($info){
            //             $imgSrc=$info->getSaveName();
            //             $date['img']=$imgSrc;
            //         }
            //     }
            // }
    //    });

        // 旧方案
        //后置钩子，添加轮播图的时候吧图片上传，并添加到数据库
        // Advertisement::event('after_insert', function ($date) {
        //     //echo $date->id;
        //     if($date['type']==2){
        //         $ad=input('post.');
        //         //dump($ad);die;
        //         foreach ($_FILES['fimg']['tmp_name'] as $k => $v) {
        //             if(!$v){
        //                 unset($ad['flink'][$k]);
        //             }
        //         }
        //         sort($ad['flink']);
        //     }
        //
        //     $files=request()->file('fimg');
        //     foreach ($files as $k => $v) {
        //         $info =$v->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
        //         if($info){
        //             $arr=array();
        //             $arr['ad_id']=$date->id;
        //             $arr['fimg']=$info->getSaveName();
        //             $arr['flink']=$ad['flink'][$k];
        //             db('adcarousel')->insert($arr);
        //         }
        //     }
        // });

        //删除之前先删除掉上传的图片
        // Advertisement::event('before_delete', function ($data) {
        //     //删除单图广告
        //     if($data['type']==1){
        //         $imgsrc=DELAD.$data['img_src'];
        //         if(file_exists($imgsrc)){
        //             @unlink($imgsrc);
        //         }
        //     }
        //     //删除轮播图广告
        //     if($data['type']==2){
        //         $carousel=db('adcarousel')->where('ad_id',$data['id'])->select();
        //         foreach ($carousel as $k => $v) {
        //             if(file_exists($v['fimg'])){
        //                 @unlink(DELAD.$v['fimg']);
        //             }
        //         }
        //         db('adcarousel')->where('ad_id',$data['id'])->delete();
        //     }
        // });
        //
        // //修改的前置操作，在修改之前把图片文件删除
        // Advertisement::event('before_update', function ($data) {
        //     dump($data);die;
        //     // //如果添加的广告是开启的，这把该广告位下的其他广告隐藏
        //     // if($date['static']==1){
        //     //     db('ad')->where('adid',$date['adid'])->data(['static' => '0'])->update();
        //     // }
        //     // //单图广告type==1
        //     // if($date['type']==1){
        //     //     if($_FILES['img']['tmp_name']){
        //     //         $file=request()->file('img');
        //     //         $info =$file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
        //     //         if($info){
        //     //             $imgSrc=$info->getSaveName();
        //     //             $date['img']=$imgSrc;
        //     //         }
        //     //     }
        //     // }
            //});
//    }
}
