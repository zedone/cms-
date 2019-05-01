<?php
# @Author: huang longpan
# @Date:   2019-03-17T18:00:45+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-17T20:16:58+08:00

namespace app\admin\controller;
use think\Controller;
/**
 *
 */
class Login extends Controller
{

    public function login()
    {
        if(session('username')&&session('id')){
            $this->redirect('Index/index');
        }
        if(request()->isPost()){
            $data=input('post.');
            if(!captcha_check($data['code'])){
                $this->error('验证码错误');
            }
            $static=model('Login')->login($data);
            if($static==1){
                $this->success('登录成功；','Index/index');
            }elseif($static==4){
                $this->error('该账号已被禁用');
            }else{
                $this->error('用户名或密码错误，请重新登录');
            }
        }
        return view();
    }

    public function logout(){
        session(null);
        $this->success('退出成功','login');
    }
}
