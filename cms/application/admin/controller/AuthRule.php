<?php
# @Author: huang longpan
# @Date:   2019-03-17T20:38:54+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T20:43:18+08:00
namespace app\admin\controller;

class AuthRule extends Common{
    public function lst(){
        $lst=db('authRule')->field('id,pid,name,title')->select();
        $sort=model('authRule')->_sort($lst);
        // dump($lst);die;
        $this->assign('lst',$sort);
        return view();
    }

    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            // dump($data);die;
            $add=db('authRule')->insert($data);
            if($add){
                $this->success('添加成功','lst');
            }else{
                $this->error('添加失败');
            }
            return;
        }

        //添加子规则
        $pid=input('pid');
        $child=db('authRule')->field('id,name')->find($pid);

        //获取上级权限
        $lst=db('authRule')->field('id,pid,title')->select();
        $ruleRes=model('AuthRule')->_sort($lst);
        $this->assign([
            'ruleRes'=>$ruleRes,
            'child'=>$child,
        ]);
        return view();
    }

    public function edit($id){
        if(request()->isPost()){
            $a=input('post.');
            $edit=db('authRule')->where('id',$a['id'])->update($a);
            if($edit!==false){
                $this->success('修改成功','lst');
            }else{
                $this->error('修改失败');
            }
        }

        //当前规则的信息
        $data=db('authRule')->find($id);

        //获取无限级权限
        $lst=db('authRule')->field('id,pid,title')->select();
        $ruleRes=model('AuthRule')->_sort($lst);

        //排除该当前规则及其子规则
        $children=model('AuthRule')->children($id);
        $children[]=$id;

        $this->assign([
            'ruleRes'=>$ruleRes,
            'edit'=>$data,
            'children'=>$children
        ]);
        return view();
    }

    public function ajaxdel($id){
        if(request()->isAjax()){
            $children=model('AuthRule')->children($id);
            $children[]=$id;
            // dump($children);die;
            $del=db('authRule')->delete($children);
            if($del){
                echo json_encode($children);
            }else{
                echo 2;
            }
        }
    }
}
