<?php

/**
 * @Author: Huang LongPan
 * @Date:   2019-03-28 20:34:25
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-31 20:49:03
 */
namespace app\install\controller;
use think\Controller;
use think\Db;
class Index extends Controller{

	public function index(){


		session('step', 0);
		session('error', false);
		echo $this->fetch();
	}

	public function step1(){
		if(session('step')!=0 && session('step')!=2){
			$this->redirect('index');
		}
		session('error',false);

		$envArr=check_env();
		$funArr=check_function();
		$dirfileArr=check_dirfile();
		$this->assign([
			'envArr'=>$envArr,
			'funArr'=>$funArr,
			'dirfileArr'=>$dirfileArr,
		]);
		session('step',1);
		return view();
	}

	public function step2(){
		if(request()->isPost()){
			$data=input('post.');
			dump($data);
			$dbArr=[
				'type'=>'mysql',
				'hostname'=>$data['db_host'],
				'database'=>$data['db_name'],
				'username'=>$data['db_user'],
				'password'=>$data['db_pwd'],
				'prefix'=>$data['db_prefix'],
				'hostport'=>$data['db_port'],
			];
			dump($dbArr);
			$adminArr=[
				'demo_data'=>$data['demo_data'],
				'site_name'=>$data['site_name'],
				'admin'=>$data['admin'],
				'password'=>$data['password'],
				'rpassword'=>$data['rpassword'],
			];
			//信息验证
			$validate = Validate('Index');
            $result = $validate->scene('admin')->check($adminArr);
            if(!$result){
				$this->error($validate->getError());
			}else{
				$adminArr=serialize($adminArr);
				session('admin_info',$adminArr);
			}

			 $result = $validate->scene('db')->check($dbArr);
            if(!$result){
				$this->error($validate->getError());
			}else{
				$_dbArr=serialize($dbArr);
				session('db_config', $_dbArr);
				$dbname=$dbArr['database'];
				unset($dbArr['database']);
				$db=Db::connect($dbArr);
				$sql="CREATE DATABASE IF NOT EXISTS {$dbname} DEFAULT CHARACTER SET utf8";
				if(!$db->execute($sql)){
					$this->error($db->getError(),'',60);
				}else{
					$this->success('创建成功', url('step3',['access'=>'success']));
				}
			}

			return;
		}
		if(session('error')){
			$this->error('失败,请重新确认第一步','index');
		}
		$step=session('step');
		if($step!=1 && $step!=2){
			$this->redirect('step1');
		}
		session('step',2);
		return view();
	}


	public function step3(){
		if(input('access')!='success' || session('step')!=2){
			$this->redirect('index');
		}
		session('step',3);
		echo $this->fetch();

		$db_config=session('db_config');
		$db_config=unserialize($db_config);
		$db=Db::connect($db_config);   //连接数据库
		create_tables($db,$db_config['prefix']);
		dump($db_config);
	}

}