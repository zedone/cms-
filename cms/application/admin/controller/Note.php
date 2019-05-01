<?php

/**
 * @Author: Huang LongPan
 * @Date:   2018-11-30 21:53:02
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2018-12-08 19:25:05
 */
namespace app\admin\controller;
use QL\QueryList;
use app\admin\model\Note as NoteModel;
class Note extends Common
{

    public function index()
    {

    	// for ($i=1; $i <	1 ; $i++) { 
    	// 	print_r($i);
    	// }
    	// die;
//{"title":[".clearfix h2","text",""],"writer":[".name a","text",""],"content":[".list_con","text",""]}
       //采集某页面所有的超链接
       	$url = 'http://yispace.net/73456.html';
		// 定义采集规则
		$rules = [
		    // 采集文章标题
		    'title' => [".meta>.meta-tit","text"],

		     'content' => ['.meta>.meta-info',"text"]
		];
		//print_r($rules);die;
		$rt = QueryList::get($url)->rules($rules)->query()->getData();

		print_r($rt);
	}

	public function lst(){
		$noteRes=db('note')->alias('a')->join('model b','a.model_id=b.id','LEFT')->field('a.id,note_name,addtime,lasttime,model_name,list_rules,item_rules')->paginate(10);
		$this->assign('noteRes',$noteRes);
		return view('list');
	}

	//采集列表页规则
	public function addListRules(){

		if (request()->isPost()) {
			$_data=input('post.');
			$data['note_name']=$_data['note_name'];
			$data['model_id']=$_data['model_id'];
			$data['output_encoding']=$_data['output_encoding'];
			$data['input_encoding']=$_data['input_encoding'];
			$data['list_rules']=array(
				'list_url' => $_data['list_url'],
				'start_page' => trim($_data['start_page']),
				'end_page' => trim($_data['end_page']),
				'step' => trim($_data['step']),
				'range' => $_data['range'],
				'num'=>$_data['num'],
				'list_rules'=>array(
						'url'=>$_data['url'],
						'litpic'=>$_data['litpic'],
					)
			);
			$data['list_rules']=json_encode($data['list_rules']);
			$data['addtime']=time();
			$add=db('note')->insertGetId($data);
			if ($add) {
				$this->redirect('addItemRules', ['noteid' => $add,'model_id'=>$data['model_id'] ], 302);
			}else{
				$this->error('新增节点失败');
			}
			
		}
		$model=db('model')->field('id,model_name')->select();
		$this->assign('model',$model);
		return view('addListRules');
	}

	//采集内容页规则
	public function addItemRules($noteid,$model_id){
		if (request()->isPost()) {
			$data=input('post.');
			$rules=array();
			foreach ($data as $k => $v) {
				if(!empty(trim($v['rule']))){
					$rules[$k][0]=$v['rule'];
					$rules[$k][1]=$v['attr'];
					$rules[$k][2]=$v['filter'];
				}
			}
			$rules=json_encode($rules);
			$save=db('note')->where('id',$noteid)->setField('item_rules',$rules);
			if ($save) {
				$this->success('添加节点成功', 'lst');
			}else{
				$this->error('新增节点失败');
			}
			dump($rules);die;
			return;
		}
		$modelFieldRes=db('modelField')->field('field_cname,field_ename')->where('model_id',$model_id)->find();
		$this->assign([
			'FieldRes'=>$modelFieldRes,
			'noteid'=>$noteid,
		]);
		return view('addItemRules');
	}

	public function docaiji($id){
		$notes=db('note')->find($id);
		// dump($notes);die;
		if($notes){
			if (!$notes['item_rules']) {
				$this->error('该采集信息不完整，请先填写信息然后进行采集');
			}
			$noteModel=new NoteModel();
			$dataItem=$noteModel->caiji($notes);
			// print_r($dataItem);die;
			//把数据写入临时表
			$data=[];
			foreach ($dataItem as $k => $v) {
				$data['nid']=$id;
				$data['title']=$v['title'];
				$data['url']=$v['url'];
				$data['addtime']=time();
				$data['result']=json_encode($v);
				db('html')->insert($data);
			}
			
			//把列表和内容整合
			print_r($data);
		}else{
			$this->error("该采集不存在");
		}
	}

}