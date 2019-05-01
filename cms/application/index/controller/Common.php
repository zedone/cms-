<?php

/**
 * @Author: Huang LongPan
 * @Date:   2019-03-23 17:20:28
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-27 22:01:11
 */
namespace app\index\controller;
use think\Controller;

class Common extends Controller
{
	public $confTemp;
	public function _initialize()
	{	
		$tempconf=$this->getTemp();
		$this->confTemp=config('template.view_path').$tempconf;   //获取所要加载的模板路径     template/default

		$temp_src=config('view_replace_str.TEMP').$tempconf;       //css，js等文件的路径

		$cateRes=$this->getCate(false);               //获取顶部栏目
		$bottomCate=$this->getCate(true);      //获取底部栏目
		$this->assign([
			'temp'=>$this->confTemp,          //分配给前台
			'temp_src'=>$temp_src,              //分配css路径信息
			'cateRes'=>$cateRes,               //顶部栏目分配
			'bottom'=>$bottomCate,               //底部栏目分配
		]);
		// dump($this->confTemp);die;
	}

	//获取数据库保存的配置
	private function getTemp(){
		$conf=db('conf')->field('value')->where('ename','template')->find();
		return $conf['value'];
	}

	//获取栏目
	private function getCate($bottom=false){
		if($bottom){	
			$swit=['bottom_nav'=>1];
			$cate=db('cate')->where(['pid'=>'0'])->where($swit)->select();       //底部
		}else{
			$swit=['state'=>1];
			$cate=db('cate')->where(['pid'=>'0'])->where($swit)->select();     //顶级栏目
		}
		
		foreach ($cate as $k => $v) {
			$cate[$k]['children']=db('cate')->where(['pid'=>$v['id']])->where($swit)->select();     //二级栏目
			foreach ($cate[$k]['children'] as $k1 => $v1) {
				$cate[$k]['children'][$k1]['children']=db('cate')->where(['pid'=>$v1['id']])->where($swit)->select();      //三级栏目
			}
		}

		return $cate;
	}

	//获取顶级栏目
	protected function topid($id){
		$one=db('cate')->find($id);
		if($one['pid']==0){
			$topid=$id;
		}else{
			$two=db('cate')->where('id',$one['pid'])->find();
			if($two['pid']==0){
				$topid=$two['id'];
			}else{
				$topid=$two['pid'];
			}
		}
		return $topid;
	}

	//获取左侧菜单栏里
	protected function leftcate($pid,$id){
		//侧边栏信息
		if($pid==0){
			$topid=$id;
		}else{
			$topid=$pid;
		}
		$left=db('cate')->where('pid',$topid)->select();
		$this->assign([	
			'left'=>$left,
			'cateid'=>$id,
		]);
	}

	//获取当前位置信息
	protected function now($cid){
		static $data=array();
		$one=db('cate')->find($cid);
		$data[0]=$one;
		if($one['pid']==0){

		}else{
			$two=db('cate')->where('id',$one['pid'])->find();
			if($two['pid']==0){
				$data[1]=$two;
			}else{
				$three=db('cate')->where('id',$two['pid'])->find();
				$data[2]=$three;
			}
		}
		$data=array_reverse($data);      //倒序
		$this->assign('now',$data);

		return $data;
	}

}