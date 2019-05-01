<?php

/**
 * @Author: Huang LongPan
 * @Date:   2018-11-11 20:25:39
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2018-11-16 23:51:13
 */

namespace app\admin\controller;
use think\Db;

class ModelField extends Common 
{	
	protected $beforeActionList = [
		'ifadd' => ['only'=>'add'],
	];

	public function lst()
	{
		$modelFieldRes=db('model_field')->alias('a')->join('model b','a.model_id=b.id')->field('a.*,b.model_name')->order('model_id desc')->select();
		$this->assign('fieldRes',$modelFieldRes);
		return view('list');
	}

	private function switchType($field_type)
	{
		switch ($field_type) {
   				case 1:
   				case 2:
   				case 3:
   				case 4:
   				case 6:
   					$fieldType='varchar(150) not null default ""';
   					break;
   				case 5:
   					$fieldType='varchar(600) not null default ""';
   					break;
   				case 7:
   					$fieldType='float not null default ""';
   					break;
   				case 8:
   					$fieldType='int not null default "0"';
   					break;
   				case 9:
   					$fieldType='longtext';
   					break;
   				default:
   					$fieldType='varchar(150) not null default ""';
   					break;
   			}
   			return $fieldType;
	}

	//判断是否可以进入添加字段页面，如果没有模型，则要先添加模型然后才可以进入添加字段
	protected function ifadd(){
		$listModel=db('model')->count();
		if(!$listModel){
			$this->error('请先添加模型','Model/lst');
		}
	}

   	public function add()
   	{
   		if(request()->isPost()){
   			$data=input('post.');
   			//验证
   			$validate=validate('ModelField');
   			if (!$validate->scene('add')->check($data)) {
   				$this->error($validate->getError());
   			}

   			if ($data['field_values']) {
   				$data['field_values'] = preg_replace("/(\n)|(\s)|(\t)|(\')|(\，)|(\.)|(\。)/" ,',' ,$data['field_values']);
   			}

   			$tableName=db('model')->where('id',$data['model_id'])->column('table_name');
   			$tableName=config("database.prefix").$tableName[0];
   			//1文本输入，2单选，3多选，4下拉菜单，5文本域，6附件 7浮点，8整型，9长文本
   			$field_type=$this->switchType($data['field_type']);
   			$sql="alter table {$tableName} add {$data['field_ename']} {$field_type}";  			
   			Db::execute($sql);
   			$add=db('model_field')->insert($data);
   			if($add){
   				$this->success('新增成功', 'lst');
   			}else{
   				$this->error('新增失败');
   			}
   			return;
   		}
   		//判断是否可以进入添加字段页面，如果没有模型，则要先添加模型然后才可以进入添加字段
   		$model_id=input('model_id');    //从管理模型直接跳转过来的添加字段
	   	$modelRes=db('model')->field('id,model_name')->select();
	   	$this->assign([
	   		'modelRes'=>$modelRes,
	   		'model_id'=>$model_id,
	   	]);
	   	return view();
   		
   	}

   	public function edit()
   	{
   		if(request()->isPost()){
   			$data=input('post.');
   			//验证
   			$validate=validate('ModelField');
   			if (!$validate->scene('edit')->check($data)) {
   				$this->error($validate->getError());
   			}
   			if($data['field_values']){
   				$data['field_values'] = preg_replace("/(\n)|(\s)|(\t)|(\')|(\，)|(\.)|(\。)/" ,',' ,$data['field_values']);
   			}
   			/*修改提交的数据不仅要修改model_field表里面的数据，还有修改相应表里面的列，采用的方法是删除原列，重新添加新列*/
   			$tableInfo=db('model')->alias('a')->join('model_field b','a.id = b.model_id')->where('b.id',$data['id'])->field('field_ename,table_name')->find();//旧字段的信息
   			$tableName=config("database.prefix").$tableInfo['table_name'];       //字段所属表
   			$oldEname=$tableInfo['field_ename'];                                 //字段旧英文名(表的列名)

   			$fieldType=$this->switchType($data['field_type']);
   			$sql="ALTER TABLE {$tableName} CHANGE {$oldEname} {$data['field_ename']} {$fieldType}";       //修改语句
   			Db::execute($sql);
   			$edit=db('model_field')->update($data);       //修改字段表的数据
   			if($edit !== false){
   				$this->success('修改成功', 'lst');
   			}else{
   				$this->error('修改失败！！');
   			}
   			return;
   		}
   		$modelRes=db('model')->field('id,model_name')->select();        //所有模型
   		$id=input('id');
   		$fieldRes=db('model_field')->find($id);             //当前字段信息
   		$this->assign([
   			'modelRes'=>$modelRes,
   			'fieldRes'=>$fieldRes
   		]);
   		return view();
   	}

   	public function ajaxdel()
   	{
   		if (request()->isAjax()) {
   			$id=input('id');
   			$fieldEname=db('model_field')->where('id',$id)->column('field_ename');             //根据字段id查找字段的英文名
   			$tableName=db('model')->alias('a')->join('model_field b','a.id = b.model_id')->where('b.field_ename',$fieldEname[0])->column('a.table_name');   //获取该字段所属的表
   			$tableName=config("database.prefix").$tableName[0];

   			$sql=("ALTER TABLE {$tableName} DROP COLUMN {$fieldEname[0]}");        //删除表字段的sql语句
   			Db::execute($sql);
   			$del=db('model_field')->delete($id);
   			if ($del) {
   				echo 1;
   			}else{
   				echo 2;
   			}
   		}else{
   			$this->error('访问失败！！','lst');
   		}
   	}

}