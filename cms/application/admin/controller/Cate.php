<?php
# @Author: huang longpan
# @Date:   2019-02-02T15:51:04+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-22T21:47:57+08:00



namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
class Cate extends Common
{
    protected $beforeActionList = [
        'ifadd' => ['only'=>'add'],
    ];

    public function lst()
    {
        $cateRes=db('cate')->alias('a')->join('model b','a.model_id=b.id','LEFT')->field('a.*,b.model_name')->order('sort desc')->select();
        // $catetree=new CateModel();
        // $catelst=$catetree->catetree();
        $catelst=model('Cate')->_catetree($cateRes);
        $this->assign('catelst',$catelst);
        return view();
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
    	if (request()->isPost()) {
    		$data=input('post.');
            // dump($data);die;
            $validate=validate('Cate');
            if (!$validate->scene('add')->check($data)) {
               $this->error($validate->getError());
            }
            $add=db('cate')->insert($data);
            if ($add) {
                $this->success('新增栏目成功', 'lst');
            }else{
                $this->error('新增栏目失败!!!!');
            }

    	}

        //判断是否可以进入添加字段页面，如果没有模型，则要先添加模型然后才可以进入添加字段
        //ifadd()

        $cate_pid=input('cate_pid');       //点击列表页栏目的添加子栏目传过来的上级栏目的id

        //栏目列表
        $catetree=new CateModel();
        $catelst=$catetree->catetree();

        //所属模型
        $model=db('model')->field('id,model_name')->select();
        $this->assign(array(
            'catelst'=>$catelst,
            'cate_pid'=>$cate_pid,
            'model'=>$model,
        ));
    	return view();
    }

    //根据上级栏目的id改变栏目模板和所属模型
    public function ajaxCateInfo()
    {
        if (request()->isAjax()) {
            $pid=input('pid');
            $data=db('cate')->field('list_tmp,article_tmp,index_tmp,model_id')->find($pid);
            echo json_encode($data);
        }
    }

    //上传图片
    public function upimg()
    {
        $file=request()->file('img');
    	if ($file) {
            $info=$file->move(ROOT_PATH.'public' .DS. 'upload' .DS. 'adminUpload');
            if ($info) {
                echo $info->getSaveName();
            }else{
                echo $info->getError();
            }
        }
    }

    //撤销上传文件，ADMINIMG 见 public/index.php
    public function delimg(){
        $a=input('img');
        $b=input('cateid');
        if($b){
            db('cate')->where('id',$b)->setField('img','');
        }
        $a=ADMINIMG.$a;
        $del=@unlink($a);
        if ($del) {
            echo 1;
        }else{
            echo 2;
        }
    }

    //修改界面的上传文件时不用点击保存，直接修改数据库数据
    public function updateimg(){
        if (request()->isAjax()) {
            $data=input('post.');
            db('cate')->where('id',$data['id'])->setField('img',$data['img']);
        }


    }

    //ajax修改栏目状态
    public function changestate(){
        if(request()->isAjax()){
            $cateid=input('id');
            // dump($cateid);die;
            $state=db('cate')->field('state')->where('id',$cateid)->find();
            $state=$state['state'];
            if ($state==1) {
                db('cate')->where('id',$cateid)->update(['state'=>0]);
                echo 0;
            }else{
                db('cate')->where('id',$cateid)->update(['state'=>1]);
                echo 1;
            }
        }else{
            $this->error('非法操作');
        }

    }

    //栏目排序
    public function sort(){
        //dump(input('post.'));die;
        if (request()->isAjax()) {
            $data=input('post.');
            foreach ($data as $k => $v) {
                db('cate')->where('id',$k)->update(['sort'=>$v]);
            }
            echo 1;
        }

    }

    //ajax删除当前栏目及其子栏目
    public function delone(){
        if (request()->isAjax()) {
            $cateid=input('cateid');
            $dels=model('cate')->children($cateid);
            $dels[]=(int)$cateid;
            $dels=array_unique($dels);            //删除重复的元素
            $del=model('Cate')->destroy($dels);
            if($del){
                echo json_encode($dels);
            }else{
                echo 2;
            }
        }else{
            $this->error('非法访问！！');
        }
    }

    //ajax批量删除
    public function delsome(){
        if (request()->isAjax()) {
            $data=input('post.');
            $ids=$data['id'];
            $_children=model('cate')->pdel($ids);
            $del=model('Cate')->destroy($_children);
            if($del)
                echo json_encode($_children);
            else
                echo 2;
        }
    }

    public function edit(){
        if (request()->isPost()) {
            $data=input('post.');
           // dump($data);die;
            if(input('state')){
                $data['state']=0;
            }else{
                $data['state']=1;
            }
            $validate=validate('Cate');
            if (!$validate->scene('edit')->check($data)) {
               $this->error($validate->getError());
            }
            $edit=db('cate')->update($data);
            if ($edit !==false) {
                $this->success('修改成功', 'lst');
            }else{
                $this->error('修改失败');
            }
        }
        $cate_id=input('id');
        $catepids=model('cate')->children($cate_id);               //查找当前栏目的子栏目
        $catepids[]=$cate_id;
        $catedata=db('cate')->where('id',$cate_id)->find();        //查找当前栏目信息分配到模板
        // dump($catedata);die;
        $catetree=new CateModel();
        $catelst=$catetree->catetree();                           //无限级栏目
        $model=db('model')->field('id,model_name')->select();   //所属模型
        $this->assign(array(
            'catelst'=>$catelst,         //无限级分类
            'catedata'=>$catedata,        //当前栏目
            'catepids'=>$catepids,          //当前栏目的子栏目
            'model'=>$model,              //模型
        ));
        return view();
    }


}
