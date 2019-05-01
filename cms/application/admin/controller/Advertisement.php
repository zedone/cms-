<?php
# @Author: huang longpan
# @Date:   2019-03-09T15:42:05+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T22:43:07+08:00

namespace app\admin\controller;
use app\admin\model\Advertisement as Admodel;

class Advertisement extends Common{

    public function lst(){
        $lstRes=db('ad')->alias('a')->join('adpos b','a.adid=b.id','LEFT')->field('a.id,a.name,a.static,b.name as bname,a.adid')->order('adid','asc')->order('sort','asc')->select();
        //dump($lstRes);die;
        $this->assign('lstRes',$lstRes);
        return view();
    }

    public function add(){
        if (request()->isPost()) {
            $date=input('post.');

            $validate = Validate('Advertisement');
            $result = $validate->scene('add')->check($date);
            if(!$result){
                $this->error($validate->getError());
            }

            $adl=new Admodel();
            $add=$adl->allowField(true)->save($date);
            if($add){
                $this->success("添加广告成功",'lst');
            }else{
                $this->error("添加广告失败");
            }
            return;
        }
        $AdposList=db('adpos')->field('id,name')->select();
        $this->assign('adlst',$AdposList);
        return view();
    }

    public function updateStatic(){
        if(request()->isAjax()){
            $data=input('post.');
            $static=db('ad')->find($data['id']);
            if($static['static']==0){
                db('ad')->where('id',$data['id'])->data(['static' => '1'])->update();
            }else{
                db('ad')->where('id',$data['id'])->data(['static' => '0'])->update();
            }
            echo 1;
        }
    }

    public function updateAllStatic(){
        if(request()->isAjax()){
            $data=input('post.');
            db('ad')->where('adid',$data['adid'])->where('id','neq',$data['id'])->data(['static'=>'0'])->update();
            echo 1;
        }
    }

    public function del($id){
        if(request()->isAjax()){
            $adl=new Admodel();
            $del=$adl::destroy($id);
            echo $del;
        }
    }

    public function edit($id)
    {
        if(request()->isPost()){
            $data=input('post.');
            $admodel=new Admodel();
            $edit=$admodel->allowField(true)->save($data,['id'=>$data['id']]);
            if($edit!==false){
                $this->success('修改广告成功','lst');
            }else{
                $this->error('修改广告失败');
            }
            return;
        }
        //获取要修改的广告信息，分配给模板
        $Ad=db('ad')->find($id);
        //获取广告位信息
        $adlst=db('adpos')->field('id,name')->select();
        $this->assign([
            'ad'=>$Ad,
            'adlst'=>$adlst
        ]);
        return view();

    }

    //排序
    public function sort(){
        if(request()->isAjax()){
            $data=input('sort');
            $arr=explode("-",$data);
            foreach ($arr as $k => $v) {
                db('ad')->where('id',$v)->update(['sort'=>$k]);
            }
            echo 1;
            // echo($data);
        }
    }


    //旧方案，把广告分为图片广告和轮播图广告，修改轮播图广告时逻辑过于繁琐，不再使用，
    // //ajax修改开启状态
    // public function UpdateStatic(){
    //     if(request()->isAjax()){
    //         $data=input('post.');
    //         $static=db('ad')->find($data['id']);
    //         if($static['static']==0){
    //             db('ad')->where('adid',$data['adid'])->data(['static' => '0'])->update();
    //             db('ad')->where('id',$data['id'])->data(['static' => '1'])->update();
    //         }else{
    //             db('ad')->where('adid',$data['adid'])->data(['static' => '0'])->update();
    //         }
    //         echo 1;
    //     }
    // }
    //
        //旧方案，把广告分为图片广告和轮播图广告，修改轮播图广告时逻辑过于繁琐，不再使用，
    // public function del($id){
    //     if(request()->isAjax()){
    //         $adl=new Admodel();
    //         $del=$adl::destroy($id);
    //         echo $del;
    //     }
    // }
    //
    // public function edit($id){
    //     if (request()->isPost()) {
    //         $data=input('post.');
    //         $adment=new Admodel();
    //         $edit=$adment::update($data);
    //     }
    //     //查询该广告的信息并分配
    //     $editLst=db('ad')->find($id);
    //     //如果该广告是轮播图广告，则还需要查询轮播图
    //     if($editLst['type']== 2){
    //         $adcarousel=db('adcarousel')->where('ad_id',$editLst['id'])->select();
    //         $this->assign('adcarousel',$adcarousel);
    //     }
    //     //查询广告位
    //     $AdposList=db('adpos')->field('id,name')->select();
    //     $this->assign([
    //         'adlst'=>$AdposList,
    //         'editData'=>$editLst,
    //     ]);
    //     return view();
    // }

}
