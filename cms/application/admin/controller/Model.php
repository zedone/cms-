<?php
namespace app\admin\controller;
use think\Db;

class Model extends Common 
{

   	public function lst(){
        $lstdata=db('model')->order('id asc')->paginate(10);
        $prefix=config("database.prefix");
        $this->assign(array(
            'lstdata'=>$lstdata,
            'prefix'=>$prefix,
        ));
   		return view('list');
   	}

   	public function add(){
   		if (request()->isPost()) {
   			$data=input('post.');
   			if (!input('state')) {
   				$data['state']=0;
   			}


            $validate=validate('Model');
            if (!$validate->scene('add')->check($data)) {
               $this->error($validate->getError());
            }

            $tableName=$data['table_name'];  //表名
            $tableName=config("database.prefix").$tableName;  //表名加前缀
            $sql="create table {$tableName} (aid int unsigned not null ) engine=MYISAM default charset=utf8";         //添加表的sql语句
            
            Db::execute($sql);                        //执行添加表操作
            $add=db('model')->insert($data);          //执行添加数据操作
   			if ($add) {
   				$this->success('新增成功', 'lst');
   			}else{
   				$this->error('新增失败');
   			}
   		}
   		return view();
   	}

    public function changestate()
    {
        if (request()->isAjax()) {
            $modelid=input('modelid');
            // dump($modelid);
            $state=db('model')->field('state')->where('id',$modelid)->find();
            $state=$state['state'];
            if ($state==1) {
                $a=db('model')->where('id',$modelid)->update(['state'=>0]);
                if ($a) {
                     echo 0;
                }else
                    echo  2;
            }else{
                $a=db('model')->where('id',$modelid)->update(['state'=>1]);
                if($a)
                    echo 1;
                else
                    echo 2;
            }
        }else{
            $this->error('非法访问!','lst');
        }
        
    }

    public function edit()
    {
        if (request()->isPost()) {
            $data=input('post.');
            if(!input('state')){
                $data['state']=0;
            }
            $validate=validate('Model');
            if (!$validate->scene('edit')->check($data)) {
               $this->error($validate->getError());
            }

            //如果新表名和旧表名相同，则不用修改表名
            if($data['old_table_name'] != $data['table_name']){
                $oldTableName=config("database.prefix").$data['old_table_name'];
                $newTableName=config("database.prefix").$data['table_name'];
                $sql=" alter table {$oldTableName} rename {$newTableName} ";                           //修改表名
         
                //数据库事务操作
                //方法一
                // static $edit;
                // Db::startTrans();
                // try{
                //     Db::execute($sql);
                //     $edit=db('model')->where('id',$data['id'])->update([
                //         'model_name'=>  $data['model_name'],
                //         'table_name'=>  $data['table_name'],
                //         'state'     =>  $data['state']
                //     ]);
                //     // 提交事务
                //     if(&&)
                //     Db::commit();
                // } catch (\Exception $e) {
                //     // 回滚事务
                //     Db::rollback();
                // }
                // 
                // 事务操作方法二
                // Db::transaction(function() use($sql,$data){
                //     Db::execute($sql);
                //     $edit=db('model')->where('id',$data['id'])->update([
                //         'model_name'=>  $data['model_name'],
                //         'table_name'=>  $data['table_name'],
                //         'state'     =>  $data['state']
                //     ]);
                // });
                Db::execute($sql);
                $edit=db('model')->where('id',$data['id'])->update([
                    'model_name'=>  $data['model_name'],
                    'table_name'=>  $data['table_name'],
                    'state'     =>  $data['state']
                ]);
            }else{
                $edit=db('model')->where('id',$data['id'])->update([
                    'model_name'=>  $data['model_name'],
                    'table_name'=>  $data['table_name'],
                    'state'     =>  $data['state']
                ]);
            }
            
            if ($edit !==false) {
                $this->success('修改成功', 'lst');
            }else{
                $this->error('修改失败');
            }
            return;
        }
        $editid=input('id');
        $editdata=db('model')->find($editid);
        $this->assign('editdata',$editdata);
        return view();
    }

    //ajax删除模型
    public function ajaxdel()
    {
        if (request()->isAjax()) {
            $id=input('id');
            
            $tableName=db('model')->field('table_name')->find($id);
            $tableName=config("database.prefix").$tableName['table_name'];
            $sql="drop table {$tableName}";

            Db::execute($sql);                       //删除表
            $a=db('model')->delete($id);             //删除model表数据
           
            if($a){
                db('model_field')->destroy(['model_id'=>$id]);     //删除model_field表数据
                echo 1;

            }else{
                echo 2;
            }

        }else{
            $this->error('非法访问','lst');
        }
    }

}
