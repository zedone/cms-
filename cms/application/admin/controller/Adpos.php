<?php
# @Author: huang longpan
# @Date:   2019-03-07T20:11:26+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-14T21:33:47+08:00



namespace app\admin\controller;
use app\admin\model\Adpos as AdposModel;

class Adpos extends Common
{
    public function lst()
    {
        $lst=db('adpos')->paginate(10);
        $this->assign('lst',$lst);
        return  view();
	}

    public function add()
    {
        if (request()->isPost()) {
            $arr=input('post.');
            $validate=validate('Adpos');
            if(!$validate->scene('add')->check($arr)){
                $this->error($validate->getError());
            }
            $add=db('adpos')->insert($arr);
            // dump($add);die;
            if ($add) {
                $this->success("添加广告位成功",'lst');
            }else{
                $this->error('添加广告位失败');
            }
            return;
        }
        return  view();
	}

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('Adpos');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $edit=db('adpos')->update($data);
            if($edit){
                $this->success("修改成功",'lst');
            }else {
                $this->error('修改失败');
            }
            return;
        }
        $date=db('adpos')->find($id);
        $this->assign('edit',$date);
        return view();
    }

    public function del(){
        if(request()->isAjax()){
            $data=input('post.');
            if($data['molds']==2){
                db('ad')->where('adid',$data['id'])->data(['adid'=>'0'])->update();
                $del=db('adpos')->where('id',$data['id'])->delete();
            }
            if($data['molds']==1){
                $AdModel=new AdposModel();
                $del=$AdModel::destroy($data['id']);
            }
            echo $del;
        }
    }

}
