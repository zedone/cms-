<?php
namespace app\admin\model;
use think\Model;

class Cate extends Model
{
    //获取无限级栏目
    public function catetree(){
        $cate=$this->order('sort desc')->select();
        return $this->_catetree($cate,$pid=0,$level=0);
    }

    public function _catetree($data,$pid=0,$level=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if ($v['pid']==$pid) {
                $v['level']=$level;
                $arr[]=$v;
                $this->_catetree($data,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    //获取当前栏目的子栏目
    public function children($cateid){
        $data=$this->field('id,pid')->select();
        return $this->_children($data,$cateid);
    }

    public function _children($data,$cateid){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($cateid==$v['pid']){
                $arr[]=$v['id'];
                $this->_children($data,$v['id']);
            }
        }
        return $arr;
    }

    //处理批量删除的数据
    public function pdel($ids){
         foreach ($ids as $v) {
                $children[]=model('cate')->children($v);
                $children[]=(int)$v;
            }
            $_children=array();
            foreach ($children as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k1 => $v1) {
                        $_children[]=$v1;
                    }
                }else{
                    $_children[]=$v;
                }
            }
            $_children=array_unique($_children);
            return $_children;
    }

    //模型事件，删除之前删除上传的图片
    protected static function init()
    {
        Cate::event('before_delete', function ($data) {
            $imgurl=$data->img;
            $imgurl=ADMINIMG.$imgurl;
            @unlink($imgurl);

        });
       
    }

}
