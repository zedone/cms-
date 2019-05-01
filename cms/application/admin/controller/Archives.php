<?php


#  @Author: Huang LongPan
# @Date:   2018-11-16 20:40:49
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-21T20:45:15+08:00

namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use think\Db;
use  \think\Request;
/**
 *
 */
class Archives extends Common
{
	public function lst()
	{
		$lstRes=db('archives')->alias('a')->join('cate b','a.cate_id=b.id','LEFT')->join('model c','c.id=a.model_id','LEFT')->field('a.id,a.title,a.attr,a.model_id,b.catename,c.model_name')->paginate(10);
		$this->assign('lstRes',$lstRes);
		return view('list');
	}

    //上传图片
    public function upimg()
    {

      	$file=request()->file('img');
    	if ($file) {
            $info=$file->move(ROOT_PATH.'public' . DS . 'upload' . DS . 'indexUpload');
            if ($info) {
            	//配置文章
            	$confRes=$this->config;
	        	if ($confRes['thumb']=='是') {
	        		//缩略图修改
	        		$width=$confRes['thumbWidth'];      //缩略图宽高
	        		$height=$confRes['thumbHeight'];
	        			//缩略图裁剪方式 等比例缩放,缩放后填充,居中裁剪,左上角裁剪,右下角裁剪,固定尺寸缩放
	        		switch ($confRes['thumbConst']) {
	        			case '等比例缩放':
	        				$thumbConst=1;
	        				break;
	        			case '缩放后填充':
	        				$thumbConst=2;
	        				break;
	        			case '居中裁剪':
	        				$thumbConst=3;
	        				break;
	        			case '左上角裁剪':
	        				$thumbConst=4;
	        				break;
	        			case '右下角裁剪':
	        				$thumbConst=5;
	        				break;
	        			case '固定尺寸缩放':
	        				$thumbConst=6;
	        				break;
	        			default:
	        				$thumbConst=1;
	        				break;
	        		}
	        		//水印,图片水印和文字水印
	        		//左上角,上居中,右上角,左居中,居中,右居中,左下角,下居中,右下角
	        		switch ($confRes['thumbWaterSouth']) {
	        			case '左上角':
	        				$thumbWaterSouth=1;
	        				break;
	        			case '上居中':
	        				$thumbWaterSouth=2;
	        				break;
	        			case '右上角':
	        				$thumbWaterSouth=3;
	        				break;
	        			case '左居中':
	        				$thumbWaterSouth=4;
	        				break;
	        			case '居中':
	        				$thumbWaterSouth=5;
	        				break;
	        			case '右居中':
	        				$thumbWaterSouth=6;
	        				break;
	        			case '左下角':
	        				$thumbWaterSouth=7;
	        				break;
	        			case '右下角':
	        				$thumbWaterSouth=8;
	        				break;
	        			case '下居中':
	        				$thumbWaterSouth=9;
	        				break;
	        			default:
	        				$thumbWaterSouth=1;
	        				break;
	        		}
	        		$tmd=$confRes['water-tmd'];  //水印透明度
	        		$water=CONF.$confRes['water-img'];  //水印图片
	        		$text=$confRes['text-text'];       //文字水印内容
	        		// dump($text);die;
	        		//处理缩略图
	            	$imgSrc=INDEXIMG.$info->getSaveName();
	            	$image= \think\Image::open($imgSrc);
	            	//$water=INDEXIMG."logo.png";

	            	if (($confRes['thumbWater']=='是') && ($confRes['water-text']=='是')) {
	        			$image->thumb($width,$height,$thumbConst)->water($water,$thumbWaterSouth,$tmd)->text($text,'../STFANGSO.ttf',20,'#ffffff')->save($imgSrc);
	        		}
	        		if (($confRes['thumbWater']=='是')&&($confRes['water-text']=='否')) {
	        			$image->thumb($width,$height,$thumbConst)->water($water,$thumbWaterSouth,$tmd)->save($imgSrc);
	        		}
	        		if (($confRes['thumbWater']=='否')&&($confRes['water-text']=='是')) {
	        			$image->thumb($width,$height,$thumbConst)->text($text,'../STFANGSO.ttf',20,'#ffffff')->save($imgSrc);
	        		}
	        		if (($confRes['thumbWater']=='否')&&($confRes['water-text']=='否')) {
	        			$image->thumb($width,$height,$thumbConst)->save($imgSrc);
	        		}
	        	}
	        	echo $info->getSaveName();


            }else{
                echo $info->getError();
            }
        }
    }

    //撤销上传文件，ADMINIMG 见 public/index.php
    public function delimg(){
        $a=input('img');
        $b=input('artid');
        if($b){
            db('Archives')->where('id',$b)->setField('litpic','');
        }
        $a=INDEXIMG.$a;
        $del=unlink($a);
        if ($del) {
            echo 1;
        }else{
            echo 2;
        }
    }

    //修改界面的上传文件时不用点击保存，直接修改数据库数据 setField更新某一个字段
    public function updateimg(){
        if (request()->isAjax()) {
            $data=input('post.');
            $tableName=db('model')->where('id',$data['model_id'])->column('table_name');     //所要删除的记录所在的数据表名
            //$Field=db('modelField')->where('model_id',$data['name'])->field('field_ename')->find();
            unlink(INDEXIMG.$data['del']);
            db($tableName[0])->where('aid',$data['aid'])->setField($data['name'],"");
            echo 1;
        }
    }

    public function upload($picName){
	// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file($picName);
		// 移动到框架应用根目录/public/uploads/ 目录下
		if($file){
			$info = $file->move(ROOT_PATH.'public/upload/indexUpload');
			if($info){
				// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				return $info->getSaveName();
			}else{
				// 上传失败获取错误信息
				echo $file->getError();
			}
		}
	}

	public function add()
	{
		$cate_id=input('cate_id');
		$model_id=input('model_id');
		if(!$model_id){
			$model_id=0;
		}
		if (request()->isPost()) {
			$data=input('post.');
			$columns=array();
			$_columns=Db::query("show columns from tp_archives");      //表tp_archives，二维数组
			foreach ($_columns as $v) {
				$columns[]=$v['Field'];       //获取表元素
			}
			$archives=array();    //存放主表数据
			$addtable=array();    //附加表数据
			foreach ($data as $k => $v) {
				if (is_array($v)) {    //如果是多选
					$v=implode(',',$v);
				}

				if (in_array($k,$columns)) {       //把表单提交的数据分别赋给主表和附表
					$archives[$k]=$v;
				}else{
					$addtable[$k]=$v;
				}
			}
			$archives['model_id']=$model_id;
			$archives['time']=time();

			//附件上传处理
			if ($_FILES) {
				foreach ($_FILES as $k => $v) {
					if($v['name'] != "")
						$addtable[$k]=$this->upload($k);
				}
			}
			// 启动事务
			Db::startTrans();
			try{
				$addArchives=db('archives')->insertGetId($archives);
				if ($model_id!=0) {
					$addtable['aid']=$addArchives;
					$tableName=db('model')->where('id',$model_id)->column('table_name');
					dump('$tableName');die;
					$addTable=db($tableName[0])->insert($addtable);
				}
				// // 提交事务
				Db::commit();
				$this->success('新增成功', 'lst');

			} catch (\think\Exception\DbException $exception) {
				// 回滚事务
				Db::rollback();
				$this->error('新增失败');
			}

			return;
		}

		//所属栏目
		$catelst=db('cate')->field('id,catename')->find($cate_id);

		//所属模型的字段
		$modelField=db('ModelField')->where('model_id',$model_id)->select();

        $this->assign([
        	'catelst'=>$catelst,     //所属栏目
        	'modelField'=>$modelField    //所属模型的字段
        ]);
		return view();
	}

	public function edit()
	{
		$id=input('id');
		$model_id=input('model_id');

		//提交修改
		if (request()->isPost()) {
			$data=input('post.');
			$columns=array();
			$_columns=Db::query("show columns from tp_archives");      //表tp_archives，二维数组
			foreach ($_columns as $v) {
				$columns[]=$v['Field'];       //获取表元素
			}
			$archives=array();    //存放主表数据
			$addtable=array();    //附加表数据
			foreach ($data as $k => $v) {
				if (is_array($v)) {    //如果是多选
					$v=implode(',',$v);
				}

				if (in_array($k,$columns)) {       //把表单提交的数据分别赋给主表和附表
					$archives[$k]=$v;
				}else{
					$addtable[$k]=$v;
				}
			}

			//附件上传处理
			if ($_FILES) {
				foreach ($_FILES as $k => $v) {
					if($v['name'] != ""){
						if ($addtable[$k]) {
							@unlink(INDEXIMG.$addtable[$k]);

						}
						$addtable[$k]=$this->upload($k);
					}
				}
			}
			// 启动事务
			Db::startTrans();
			try{
				$addArchives=db('archives')->update($archives);
				if ($model_id!=0) {
					// $addtable['aid']=$addArchives;
					$tableName=db('model')->where('id',$model_id)->column('table_name');
					$addTable=db($tableName[0])->where('aid',$id)->update($addtable);
				}
				// 提交事务
				Db::commit();
				$this->success('修改成功', 'lst');
			} catch (\think\Exception\DbException $exception) {
				// 回滚事务
				Db::rollback();
				$this->error('修改失败');
			}
			return;
		}

		//当前文章信息
		$archives=db('archives')->alias('a')->join('cate b','a.cate_id=b.id')->field('a.*,b.catename')->find($id);

		//附表字段
		$modelField=db('ModelField')->where('model_id',$model_id)->select();
		//dump($modelField);
		//附表内容
		if ($model_id!=0) {
			$modelName=db('model')->where('id',$model_id)->column('table_name');
			//dump($modelName);
			$Field=db($modelName[0])->where('aid',$id)->limit('1')->find();
			// dump($Field);die;
			$this->assign('Field',$Field);
		}

		$this->assign([
			'archives'=>$archives,
			'modelField'=>$modelField
		]);
		return view();
	}
}
