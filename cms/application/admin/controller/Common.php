<?php
# @Author: huang longpan
# @Date:   2019-02-02T15:51:04+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-04-01T21:17:48+08:00



namespace app\admin\controller;
use think\Controller;
use think\Request;
use auth\Auth;
use think\Loader;

class Common extends Controller
{
	public $config;

    public function _initialize()
    {
		//登录验证
		if(!session('username')){
			$this->error('请先登录','Login/login');
		}
		//左侧菜单栏对应的菜单显示
        $request=Request::instance();
        $con=$request->controller();    //获取当前的控制权
        $this->assign('con',$con);
  		$this->getConf();

		//权限的加载，
		$auth=new Auth();
		$module=$request->module();//获取模块  admin
		$action=$request->action();//获取方法
		$name=$con.'/'.$action;
	//	 var_dump($name);
		// dump(session('id'));die;
		$notCheck=array('admin/Index/index','admin/Index/logout');   //不需要权限即可访问的页面
        if(session('id')!=1){                   //id为1的超级管理员
        	if(!in_array($name, $notCheck)){     
        		if(!$auth->check($name,session('id'))){        
       				$this->error('没有权限','index/index');
       			}
        	}
        	
        }
		// $notCheck=array('admin/Index/index');
		// if(!$auth->check($name,session('id'))){
		// 	$this->error('当前角色没有该权限');
		// }


		//左侧菜单的加载
		$group=$auth->getGroups(session('id'));
		$rules=explode(',',$group[0]['rules']);    //调用auth下的方法，查询所登录的用户的权限
		$menu=array();
		$menu=db('authRule')->where(['pid'=>'0'])->where('id','in',$rules)->where('show','1')->select();  //一级权限
		foreach ($menu as $k => $v) {
			$menu[$k]['children']=db('authRule')->where('pid',$v['id'])->where('id','in',$rules)->where('show','1')->select();  //二级权限
			foreach ($menu[$k]['children'] as $k1 => $v1) {
				$menu[$k]['children'][$k1]['children']=db('authRule')->where('pid',$v1['id'])->where('id','in',$rules)->where('show','1')->select();  //三级权限

			}
		}
		$this->assign([
			'menu'=>$menu,
		]);


    }

	//配置的加载
    public function getConf(){
    	$confRes=array();
    	$_confRes=db('conf')->field('ename,value')->select();
    	foreach ($_confRes as $v) {
    		$confRes[$v['ename']]=$v['value'];
    	}
    	$this->config=$confRes;

    }

}
