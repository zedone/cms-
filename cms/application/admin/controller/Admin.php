<?php
# @Author: huang longpan
# @Date:   2019-03-16T20:18:02+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T20:50:32+08:00
namespace app\admin\controller;
use think\Db;
class Admin extends Common{

    public function lst(){
        //连表查询用户组
        $lstRes=db('admin')->alias('a')->join('authGroup b','a.groupid=b.id','LEFT')->field('a.id,a.username,a.last_time,a.static,b.title')->select();
        $this->assign('lstRes',$lstRes);
        return view();
    }


    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $validate = Validate('Admin');
            $result = $validate->scene('add')->check($data);
            if(!$result){
                $this->error($validate->getError());
            }
            $data['password']=md5($data['password']);
            $data['create_time']=time();
            $data['last_time']=time();


            //把添加的所属用户组添加到auth_group_access表
            // 启动事务
            Db::startTrans();
            try{
                $add=db('admin')->insertGetId($data);
                $acc=db('authGroupAccess')->insert(['uid'=>$add,'group_id'=>$data['groupid']]);
                // Db::table('think_user')->find(1);
                // Db::table('think_user')->delete(1);
                if($add && $acc){
                    // 提交事务
                    Db::commit();
                    $this->success('添加成功','lst');
                }else{
                    Db::rollback();
                    $this->error('添加失败');
                }
            } catch (\think\Exception\DbException $exception) {
                // 回滚事务
                Db::rollback();
                $this->error('添加失败');
            }
            return;
        }
        //获取用户组
        $group=db('authGroup')->field('id,title')->select();
        $this->assign('group',$group);
        return view();
    }

    public function ajaxdel($id){
        if(request()->isAjax()){
            // echo $id;die;
            if($id !=1){
                $del=db('admin')->delete($id);
                db('authGroupAccess')->where('uid',$id)->delete();
                if($del){
                    echo 1;
                }else{
                    echo 2;
                }
            }else{
                echo 2;
            }
        }
    }

    public function changeStatic($id){
        if(request()->isAjax()){
            if($id!=1){
                $admin=db('admin')->find($id);
                if($admin['static'] == 1){
                    $change=db('admin')->where('id',$id)->setField('static','0');
                }else{
                    $change=db('admin')->where('id',$id)->setField('static','1');

                }
                echo $change;
            }else{
                echo 0;
            }
        }
    }

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');

            $validate = Validate('Admin');
            $result = $validate->scene('edit')->check($data);
            if(!$result){
                $this->error($validate->getError());
            }

            $data['password']=trim($data['password']);

            //把添加的所属用户组添加到auth_group_access表
            // 启动事务
            Db::startTrans();
            try{
                //是否修改密码，即修改界面密码是否输入
                if($data['password']==""){
                    $change=db('admin')->where('id',$id)->update(['groupid'=>$data['groupid'],'username'=>$data['username']]);
                    $acc=db('authGroupAccess')->where('uid',$id)->update(['group_id'=>$data['groupid']]);
                }else{
                    $data['password']=md5($data['password']);
                    $change=db('admin')->where('id',$id)->update($data);
                    $acc=db('authGroupAccess')->where('uid',$id)->update(['group_id'=>$data['groupid']]);
                }

                if(($change!==false) && ($acc!==false)){
                    // 提交事务
                    Db::commit();
                    $this->success('修改成功','lst');
                }else{
                    Db::rollback();
                    $this->error('修改失败');
                }
            } catch (\think\Exception\DbException $exception) {
                // 回滚事务
                Db::rollback();
                $this->error('修改失败');
            }
            return;
        }
        //获取用户组
        $group=db('authGroup')->field('id,title')->select();

        $admin=db('admin')->find($id);
        $this->assign([
            'ad'=>$admin,
            'group'=>$group
        ]);
        return view();
    }

}
