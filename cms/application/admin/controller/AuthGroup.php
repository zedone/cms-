<?php
# @Author: huang longpan
# @Date:   2019-03-19T18:57:59+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T16:07:28+08:00
namespace app\admin\controller;
/**
 *
 */
class AuthGroup extends Common
{

    public function lst(){
        $lst=db('authGroup')->select();
        $this->assign('lst',$lst);
        return view();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $add=db('authGroup')->insert($data);
            if($add){
                $this->success('添加用户组成功','lst');
            }else{
                $this->error('添加失败');
            }
            return;
        }
        return view();
    }

    public function changeStatic($id){
        if(request()->isAjax()){
            $data=db('authGroup')->field('status')->find($id);
            if($data['status']==1){
                $change=db('authGroup')->where('id',$id)->setField('status','0');
            }else{
                $change=db('authGroup')->where('id',$id)->setField('status','1');
            }
            echo $change;
        }
    }

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            // dump($data);die;
            $edit=db('authGroup')->where('id',$data['id'])->update($data);
            if($edit!==false){
                $this->success('修改成功','lst');
            }else{
                $this->error('修改失败');
            }
            return;
        }
        $inf=db('authGroup')->find($id);
        $this->assign('inf',$inf);
        return view();
    }

    public function ajaxdel($id){
        if(request()->isAjax()){
            $del=db('authGroup')->delete($id);
            // db('admin')->where('group_id',$id)->update(['group_id'=>'0']);
            echo $del;
        }
    }

    public function power($id){
        if(request()->isPost()){
            $power=input('post.');
            // dump($power);die;
            //判断如果有权限分配，则把权限数组转换为字符串
            if(isset($power['rules'])){
                $rules=implode(',',$power['rules']);
            }else{
                $rules='0';
            }

            $edit=db('authGroup')->where('id',$id)->update(['rules'=>$rules]);
            if($edit!==false){
                $this->success('权限分配成功','lst');
            }else{
                $this->error('权限分配失败');
            }
            return;
        }

        //无限级权限导入，##############该方法最高权限为3级
        $data=db('authRule')->where('pid','0')->select();  //顶级权限，pid=0

        foreach ($data as $k1 => $v1) {
             //循环查找每一个顶级权限的子权限为二级权限，数组变为四维数组
            $data[$k1]['children']=db('authRule')->where('pid',$v1['id'])->select();

            foreach ($data[$k1]['children'] as $k2 => $v2) {
                //根据二级权限循环查找三级权限
                $data[$k1]['children'][$k2]['children']=db('authRule')->where('pid',$v2['id'])->select();
            }
        }

        //当前用户组的信息
        $pow=db('authGroup')->find($id);
        //把拥有的权限显示方法，把拥有的权限转换为数组
        $rule=explode(",",$pow['rules']);
        $this->assign([
            'pow'=>$pow,
            'auth'=>$data,
            'rule'=>$rule
        ]);
        return view();
    }

}
