<?php

/**
 * @Author: Huang LongPan
 * @Date:   2018-12-06 09:37:24
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2018-12-08 15:45:27
 */
namespace app\admin\model;
use think\Model;
use QL\QueryList;
class Note extends Model
{

	public function caiji($notes)
	{
		//采集参赛
			//输出编码
			$inputEncoding=$notes['input_encoding'];
			//输入编码
			$outputEncoding=$notes['output_encoding'];
			//采集列表
			$listRules=$notes['list_rules'];
			$listRules=json_decode($listRules,true);
			//采集内容页规则
			$itemRules=$notes['item_rules'];
			$itemRules=json_decode($itemRules,true);
			//采集网址
			$listUrl=$listRules['list_url'];
			//采集开始页码
			$starPage=$listRules['start_page'];
			//采集结束页码
			$endPage=$listRules['end_page'];
			//页码步长
			$step=$listRules['step'];
			if(empty(trim($step))){
				$step=1;
			}
			//采集范围
			$range=$listRules['range'];
			//最大采集条数
			//$num=$listRules['num'];
			//采集规则
			$ListCaijiRules=$listRules['list_rules'];
			$ListCaijiRules=[
				'url'=>array($ListCaijiRules['url'],'href'),
				'litpic'=>array($ListCaijiRules['litpic'],'src')
			];
			//采集实际网址
			$_listUrl=[];
			//处理采集网址列表
			//如果采集的起始页和终止页相同，就不用循环
			if (empty(trim($starPage))||empty(trim($endPage))) {
				$_listUrl[]=$listUrl;
			}else{
				for ($i=$starPage; $i<=$endPage; $i+=$step) { 
					$_listUrl[]=str_replace('(*)',$i,$listUrl);
				}
			}
			//循环采集网页
			$_dataList=[];
			//static $_num=0;
			$ql1=QueryList::rules($ListCaijiRules);
			foreach ($_listUrl as $k => $url) {
				$_dataList[] =$ql1->get($url)->range($range)->encoding($inputEncoding,$outputEncoding)->query()->getData();
				$ql1->destruct();
			}
			//print_r($_dataList);
			//采集结果数组重构
			$dataList=[];
			foreach ($_dataList as $k => $v) {
				foreach ($v as $k1 => $v1) {
					$dataList[]=$v1;
				}
			}
			// print_r($dataList);die;
			// print_r($itemRules);die;
			//内容页采集
			$_dataItem=[];
			//循环每一个采集列表，根据每一个采集列表所采集到的url来采集所对应的内容
			$q=new \QL\QueryList();
			$ql2=$q->rules($itemRules);
			foreach ($dataList as $k => $v) {
				$_dataItem[]=$ql2->get($v['url'])->query()->getData(function($item) use($v){
					$item['url']=$v['url'];
					$item['litpic']=$v['litpic'];
					return $item;
				});
				$ql2->destruct();		
			}
			 // print_r($_dataItem);die;
			//整合采集到的内容
			$dataItem=[];
			foreach ($_dataItem as $k => $v) {
				foreach ($v as $k1 => $v1) {
					$dataItem[]=$v1;
				}
			}

			return $dataItem;
	}
}