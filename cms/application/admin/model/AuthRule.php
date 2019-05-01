<?php
# @Author: huang longpan
# @Date:   2019-03-18T19:51:38+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-19T19:16:50+08:00
namespace app\admin\model;
use think\Model;

class AuthRule extends Model
{
    public function _sort($lst){
    
        return $this->sort($lst);
    }

    public function sort($lst,$pid=0,$level=0){
        static $arr=array();
        foreach ($lst as $k => $v) {
            if($v['pid']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($lst,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    public function children($id){
        $a=db('authRule')->field('id,pid')->select();
        return $this->_children($a,$id);
    }

    public function _children($a,$id){
        static $arr=array();
        foreach ($a as $k => $v) {
            if($id==$v['pid']){
                $arr[]=$v['id'];
                $this->_children($a,$v['id']);
            }
        }
        return $arr;
    }

}
