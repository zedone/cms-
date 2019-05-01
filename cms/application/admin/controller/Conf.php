<?php
namespace app\admin\controller;
use app\admin\controller\Common;

class Conf extends Common
{
    public function conflst()
    {
    	$confRes=db('conf')->select();
    	$this->assign('confRes',$confRes);

    	if (request()->isPost()) {
    		$data=input('post.');
    		
            //多选
    		foreach ($data as $k => $v) {
    			$arr[]=$k;
    			
    			if (is_array($v)) {
    				$v=implode(',',$v);
    			}
    			db('conf')->where('ename',$k)->update(['value'=>$v]);
    		}

    		//多选清空
    		$ename=db('conf')->where('dt_type',3)->column('ename');
    		foreach ($ename as $k => $v) {
    			if (!in_array($v,$arr)) {
    				db('conf')->where('ename',$v)->update(['value'=>'']);
    			}
    		}

    		//处理附件
    		$imgColumn=db('conf')->where('dt_type',6)->column('ename');
    		foreach ($imgColumn as $k => $v) {
    			if ($_FILES[$v]['tmp_name'] !='') {
    				$file=request()->file($v);
    				$info=$file->move(ROOT_PATH.'public'. DS .'upload');
    				if ($info) {
    					$imgSrc=$info->getSaveName();
    					db('conf')->where('ename',$v)->update(['value'=>$imgSrc]);
    				}

    			}
    		}

    		$this->success('修改配置成功', 'conflst');
    	}

        return view();
    }

    public function lst()
    {
    	$ConfRes=db('conf')->field('id,cname,ename,value,values')->paginate(10);
    	$this->assign('ConfRes',$ConfRes);
        return view();
    }

    public function add()
    {
    	if (request()->isPost()) {
    		$data=input('post.');
    		$inputValue=input('values');
			$values= preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/" ,',' ,$inputValue);  //把可选值以英文逗号分隔
			$data['values']=$values;
			$value = substr($values,0,strrpos($values,','));      //截取values的第一个，以前的字符

			if($data['value']==null){
				$data['value']=$value;							//默认值为第一个可选值
			}
			
    		// dump($data);die;
    		// 验证
    		$validate=validate('Conf')->scene('add');
    		if (!$validate->check($data)) {
    			$this->error($validate->getError());
    		}
   			//$validate = new \app\index\validate\Conf($data);
			// $result = $validate->scene('add')->check($data); 
    		
    		$add=db('conf')->insert($data);
    		if ($add) {
    			$this->success('新增配置成功', 'lst');
    		}else{
    			$this->error('新增配置失败');
    		}
    		return;
    	}
        return view();
    }

    public function edit($id)
    {
    	$conf=db('conf')->find($id);
    	//dump($conf);die;
    	$this->assign('conf',$conf);
    	if(request()->isPost()){
    		$data=input('post.');
    		$inputValue=input('values');
			$values= preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/" ,',' ,$inputValue);  //把可选值以英文逗号分隔
			$data['values']=$values;
			$value = substr($values,0,strrpos($values,','));      //截取values的第一个，以前的字符
			
			if($data['value']==null){
				$data['value']=$value;							//默认值为第一个可选值
			}
			
			//验证
    		$validate=validate('Conf')->scene('edit');
    		if (!$validate->check($data)) {
    			$this->error($validate->getError());
    		}

    		$edit=db('conf')->update($data);
    		if ($edit) {
    			$this->success('修改配置成功', 'lst');
    		}else{
    			$this->error('修改配置失败');
    		}
    	}
        return view();
    }

    public function del($id)
    {
        $del=db('conf')->delete($id);
        if ($del) {
        	$this->redirect('lst');
        }else{
        	$this->error('删除失败');
        }
    }

    public function ajaxdel(){
        if (request()->isAjax()) {
            $del=db('conf')->delete(input('id'));
            if ($del) {
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $this->error('非法操作');
        }
    }
}
