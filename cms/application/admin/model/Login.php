<?php
# @Author: huang longpan
# @Date:   2019-03-12T19:18:33+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-17T20:15:50+08:00

namespace app\admin\model;
use think\Model;
use think\Db;

class Login extends Model
{
    public function login($data){
        $admin=Db::table('tp_admin')->where('username',$data['username'])->limit(1)->find();
        if($admin){
            $data['password']=md5($data['password']);
            if($data['password']==$admin['password']){

                if($admin['static']!=1){
                    return 4;//用户被禁用了
                }
                
                session('username',$data['username']);
                session('id',$admin['id']);
                return 1;//登录成功
            }else{
                return 3;//密码错误
            }


        }else{
            return 2;//用户名不存在
        }

    }


}
