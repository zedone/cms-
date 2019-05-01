<?php
namespace app\index\controller;

class Index  extends Common
{
    public function index()
    {
    	// dump($this->confTemp);
    	// 
    	
    	//顶部菜单栏的高亮显示
        $topstatic=$this->topid(0);
        $this->assign('top',$topstatic);

        //关于我们
        $aboutUs=model('Index')->aboutUs();


        //技术服务
        $technology=model('Index')->technology();

         //公司新闻
        $journalism=model('Index')->journalism();

        //产品中心
        
        $product=model('Index')->product();
        // dump($product);
        // 
        //首页轮播图广告
        $inner=model('Index')->inner(1);
        // dump($inner);
        $this->assign([
            'aboutUs'=>$aboutUs,
            'technology'=>$technology,
            'journalism'=>$journalism,
            'product'=>$product,
            'inner'=>$inner
        ]);
    	
    	$fetch=$this->confTemp.'/index.htm';
        return $this->fetch($fetch);
    }
}
