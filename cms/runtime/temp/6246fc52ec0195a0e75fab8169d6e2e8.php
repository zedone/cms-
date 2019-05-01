<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:29:"../template/default/index.htm";i:1553681516;s:63:"D:\phpstudy\PHPTutorial\WWW\cms\template\default\common\top.htm";i:1553681494;s:65:"D:\phpstudy\PHPTutorial\WWW\cms\template\default\common\inner.htm";i:1553681751;s:64:"D:\phpstudy\PHPTutorial\WWW\cms\template\default\common\foot.htm";i:1553428922;}*/ ?>
<!DOCTYPE html>
<head id="Head">
<script type="text/javascript">var allpane = 'headerAreaA|mainArea|footerAreaA|bottomAreaA|fixedBottomArea|fixed-left|fixed-right|popup-area';</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="author" content="order by 童老师ThinkPHP交流群：333632569"/>
<title>童老师ThinkPHP交流群：333632569</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta http-equiv="PAGE-ENTER" content="RevealTrans(Duration=0,Transition=1)"/>
<link id="qhddefaultcontent2075_css" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/qhdcontent.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_content_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/content.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_menu_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/menu.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_jquery_fancybox_1_3_4_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/jquery.fancybox-1.3.4.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_pgwslideshow_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/pgwslideshow.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_animate_min_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/animate.min.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_style_css?ver=1_2" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/style.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_style_PurpleAndPink_css" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/style-purpleandpink.css"/>
<style>html{background-image:url(<?php echo $temp_src; ?>/img/bg-rep-02.png);}</style>
<!--[if lt IE 9]>
 <script src="<?php echo $temp_src; ?>/js/html5.js"></script>
<![endif]--><!--[if IE 6]>
 <script type="text/javascript" src="<?php echo $temp_src; ?>/js/ie7.js"></script>
 <script type="text/javascript" src="<?php echo $temp_src; ?>/js/dd_belatedpng.js"></script>
 <script type="text/javascript">
  DD_belatedPNG.fix('.top img, .footer img, .bottom img, .form-btn, .module-icon-default');
 </script>
<![endif]-->
<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
</head>
<body class="font-zh-CN" style="background:url(<?php echo $temp_src; ?>/img/bg-img-04.jpg) top center fixed;">
<form name="Form" method="post" action="/" id="Form" enctype="multipart/form-data" style="height:inherit">
<div>
<input type="hidden" name="__VIEWSTATE_CACHEKEY" id="__VIEWSTATE_CACHEKEY" value="VS_zi22fwealafeoqsfpov1x2t0_/"/>
</div>
<script src="<?php echo $temp_src; ?>/js/a1portalcore.js" type="text/javascript"></script><script src="<?php echo $temp_src; ?>/js/a1portal.js"></script><script src="<?php echo $temp_src; ?>/js/jquery-1.7.2.min.js"></script><script src="<?php echo $temp_src; ?>/js/superfish.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.caroufredsel.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.touchswipe.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.tools.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.fancybox-1.3.4.pack.js"></script><script src="<?php echo $temp_src; ?>/js/pgwslideshow.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.fixed.js"></script><script src="<?php echo $temp_src; ?>/js/cloud-zoom.1.0.2.min.js"></script><script src="<?php echo $temp_src; ?>/js/device.min.js"></script><script src="<?php echo $temp_src; ?>/js/html5media-1.2.js"></script><script src="<?php echo $temp_src; ?>/js/animate.min.js"></script><script src="<?php echo $temp_src; ?>/js/custom.js"></script>
<div id="wrapper" class="home-page"> 


<!-- /**
 * @Author: Huang LongPan
 * @Date:   2019-03-24 15:28:58
 * @Last Modified by:   Huang LongPan
 * @Last Modified time: 2019-03-27 17:13:27
 */ -->
<header class="top header-v1 desktops-section default-top">   
<div class="top-main">
<div class="page-width clearfix">
<div class="logo" skinobjectzone="HtmlLogo_399"><a href="/"><img src="<?php echo $temp_src; ?>/img/472d1f03-0560-4338-846b-b29ac61e993a_0_80.png" alt="中英双语响应式生物科技实验室类织梦模板(自适应)"/></a></div>
  
<nav class="nav">
<div class="main-nav clearfix" skinobjectzone="menu_461">
<ul class="sf-menu">
<li ><a class="first-level" href="<?php echo url('Index/index'); ?>" target=""><strong>网站首页</strong></a><i></i></li>

<?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): if( count($cateRes)==0 ) : echo "" ;else: foreach($cateRes as $key=>$cate): ?>
<li <?php if($top == $cate['id']): ?> class='current' <?php endif; ?> class=""><a class="first-level" href="
            <?php switch($cate['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$cate['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$cate['id'])); break; case "2": ?><?php echo $cate['link']; break; default: ?><?php echo $cate['link']; endswitch; ?>
  " target=""><strong><?php echo $cate['catename']; ?></strong></a><i></i>

	<?php if($cate['children']): ?>
  <ul class="">

    <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): if( count($cate['children'])==0 ) : echo "" ;else: foreach($cate['children'] as $key=>$vo): ?>
      <li class=""><a class="" href="
            <?php switch($vo['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$vo['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$vo['id'])); break; case "2": ?><?php echo $cate['link']; break; default: ?><?php echo $vo['link']; endswitch; ?>
        " target=""><strong><?php echo $vo['catename']; ?></strong></a></i>

      	<?php if($vo['children']): ?>
          <ul class="">
              <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo1): ?>
                  <li class=""><a class="first-level" href="
                      <?php switch($vo1['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$vo1['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$vo1['id'])); break; case "2": ?><?php echo $vo1['link']; break; default: ?><?php echo $cate['link']; endswitch; ?>
                    " target=""><strong><?php echo $vo1['catename']; ?></strong></a><i></i>
                  </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <?php endif; ?>
   
      </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>

  </ul>
  <?php endif; ?>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>

</ul>
</div>
</nav>
  
<div class="language float-right" skinobjectzone="HtmlLanguage_1268">
<ul class="sf-menu">
<li><a href="javascript:;" class="first-level"><span><em>中文简体</em></span></a>
<ul>
<li><a href="/en/"><span><em>English</em></span></a></li>
<li><a href="/"><span><em>中文简体</em></span></a></li>
</ul>
</li>
</ul>
</div>
 </div>
</div>
 
<div class="clear"></div>
</header>


<!-- 手机版样式 -->
<div class="touch-top mobile-section clearfix">
<div class="touch-top-wrapper clearfix">
<div class="touch-logo" skinobjectzone="HtmlLogo_2643"><a class="" href="/"><img src="<?php echo $temp_src; ?>/img/472d1f03-0560-4338-846b-b29ac61e993a_0_80.png" alt="中英双语响应式生物科技实验室类织梦模板(自适应)"/></a></div>
 
<div class="touch-navigation">
<div class="touch-toggle">
<ul>
<li class="touch-toggle-item-first"><a href="javascript:;" class="drawer-language" data-drawer="drawer-section-language"><i class="touch-icon-language"></i><span>语言</span></a></li>
<li class="touch-toggle-item-last"><a href="javascript:;" class="drawer-menu" data-drawer="drawer-section-menu"><i class="touch-icon-menu"></i><span>导航</span></a></li>
</ul>
</div>
</div>
 </div>
 
<div class="touch-toggle-content touch-top-home">
<div class="drawer-section drawer-section-language">
<ul class="touch-language clearfix" skinobjectzone="HtmlLanguage_2924">
<li><a href="/en/">English</a></li>
<li><a href="/">中文简体</a></li>
</ul>
</div>
<div class="drawer-section drawer-section-menu">
<div class="touch-menu" skinobjectzone="menu_3142">

<ul>
<li><a href="/"><span>网站首页</span></a></li>

  <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): if( count($cateRes)==0 ) : echo "" ;else: foreach($cateRes as $key=>$cate): ?>
  <li><a href="
             <?php switch($cate['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$cate['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$cate['id'])); break; case "2": ?><?php echo $cate['link']; break; default: ?><?php echo $cate['link']; endswitch; ?>
    "><span><?php echo $cate['catename']; ?></span><i class="touch-arrow-down"></i></a>
    <?php if($cate['children']): ?>
        <ul>
            <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): if( count($cate['children'])==0 ) : echo "" ;else: foreach($cate['children'] as $key=>$vo): ?>
              <li><a href="
                        <?php switch($vo['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$vo['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$vo['id'])); break; case "2": ?><?php echo $cate['link']; break; default: ?><?php echo $vo['link']; endswitch; ?>
                "><span><?php echo $vo['catename']; ?></span></a>
                <?php if($vo['children']): ?>
                <ul>
                     <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo1): ?>
                        <li><a href="
                                <?php switch($vo1['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$vo1['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$vo1['id'])); break; case "2": ?><?php echo $vo1['link']; break; default: ?><?php echo $cate['link']; endswitch; ?>
                            "><?php echo $vo1['catename']; ?></a></li>
                     <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
              </li>

            <?php endforeach; endif; else: echo "" ;endif; ?>
              
        </ul>
    <?php endif; ?>
</li>
  <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
     
     $(".touch-toggle a").click(function(event){
      var className = $(this).attr("data-drawer");
      
      if( $("."+className).css('display') == 'none' ){      
       $("."+className).slideDown().siblings(".drawer-section").slideUp();
      }else{
       $(".drawer-section").slideUp(); 
      }
      event.stopPropagation();
     });
     
     /*$(document).click(function(){
      $(".drawer-section").slideUp();     
     })*/
     
     $('.touch-menu a').click(function(){     
      if( $(this).next().is('ul') ){
       if( $(this).next('ul').css('display') == 'none' ){
        $(this).next('ul').slideDown();
        $(this).find('i').attr("class","touch-arrow-up");     
       }else{
        $(this).next('ul').slideUp();
        $(this).next('ul').find('ul').slideUp();
        $(this).find('i').attr("class","touch-arrow-down");
       }   
      }
     });
    });
</script></div>
 </div>



  <div id="a1portalSkin_headerAreaA" class="header"> <a name="31437" id="31437"></a>
<div class="module-default">
<div class="module-inner">
<div id="a1portalSkin_ctr8920789207_mainArea" class="module-content">  
<div class="slideshow carousel clearfix" style="height:550px; overflow:hidden;">
<div id="carousel-89207">

<?php if(is_array($inner) || $inner instanceof \think\Collection || $inner instanceof \think\Paginator): $i = 0; $__LIST__ = $inner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="carousel-item">
<div class="carousel-img"><a href="<?php if($vo['link']): ?><?php echo $vo['link']; else: ?>javascript:;<?php endif; ?>" target=""><img src="/cms/public/static/index/ad/<?php echo $vo['img']; ?>" height="550" alt="幻灯<?php echo $i; ?>"/></a></div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>

</div>
<div class="carousel-btn carousel-btn-fixed" id="carousel-page-89207"></div>
</div>
<script type="text/javascript">
 
 $(window).bind("load resize",function(){
  $("#carousel-89207").carouFredSel({
   width       : '100%',
   items  : { visible : 1 },
   auto     : { pauseOnHover: true, timeoutDuration:5000 },
   swipe     : { onTouch:true, onMouse:true },
   pagination  : "#carousel-page-89207"
   //prev   : { button:"#carousel-prev-89207"},
   //next   : { button:"#carousel-next-89207"},
   //scroll   : { fx : "crossfade" }
  });
 });
</script>  </div>
</div>
</div>
</div>
   

  
<section class="main">
<div id="a1portalSkin_mainArea" class="page-width clearfix"> <a name="31462" id="31462"></a>
<div class="module">
<div class="module-inner">
<div class="module-title module-title-default clearfix">
<div class="module-title-content clearfix">
<h3 style="background-image:url(<?php echo $temp_src; ?>/img/3a61ab32-7a2c-4dfe-b0c1-83c18d771c6c_32_32.png);" class="module-icon-default">产品中心</h3>
</div>
</div>
<div id="a1portalSkin_ctr8921389213_mainArea" class="module-content">  
<div class="scrollable carousel product-scrollable product-set clearfix">
<ul id="scrollable-89213" class="scrollable-default clearfix">
  <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li>
    <div class="scrollable-item">
    <p class="scrollable-img"><a target="_blank" href="<?php echo url('Article/index',array('id'=>$vo['id'])); ?>"><img src="/cms/public/upload/indexUpload/<?php echo $vo['litpic']; ?>" alt="<?php echo $vo['title']; ?>" /></a></p>
    <h2><a target="_blank" href="<?php echo url('Article/index',array('id'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a></h2>
    </div>
    </li>
  <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="carousel-direction"><a class="carousel-prev" id="carousel-prev-89213" href="javascript:;"><span><</span></a><a class="carousel-next" id="carousel-next-89213" href="javascript:;"><span>></span></a></div>
              </div>
              <!-- E scrollable--><!-- End_Module_89213 --></div>
          </div>
          <div class="module-divider"></div>
        </div>
        <!-- Start_Module_89214 --><a name="31463" id="31463"></a>
         <div class="module-default">
          <div class="module-inner">
            <div id="a1portalSkin_ctr8921489214_mainArea" class="module-content"><!-- Start_Module_89214 -->
              <div class="qhd-module">
                <div class="column">
                  <div class="col-3-1">
                    <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_QHDCPM89214M1" class="qhd_column_contain"><!-- Start_Module_89215 --><a name="31464" id="31464"></a>
                      <div class="module">
                        <div class="module-inner">
                          <div class="module-title module-title-default clearfix">
                            <div class="module-title-content clearfix">
                              <h3 style="background-image:url(<?php echo $temp_src; ?>/img/93c1b651-194d-43f5-861d-48759f29f978_32_32.png);" class="module-icon-default">公司新闻</h3>
                            </div>
                          </div>
                          <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_ctr8921589215_mainArea" class="module-content"><!-- Start_Module_89215 --><!-- S entry-list -->
                            <div class="entry-list entry-list-article entry-list-time-hl entry-set-time-hl">
                            <!-- S entry-item -->
                              <div class="entry-item">
                                <div class="time">
                                  <p class="time-day"><?php echo date("d",$journalism['time']); ?></p>
                                  <p class="time-date"><?php echo date("Y-m",$journalism['time']); ?></p>
                                </div>
                                <div class="entry-title">
                                  <h2><a href="<?php echo url('Article/index',array('id'=>$journalism['id'])); ?>" target="_blank"><?php echo $journalism['title']; ?></a></h2>
                                </div>
                                <div class="entry-summary">
                                  <div class="qhd-content">
                                    <p><?php echo $journalism['description']; ?></p>
                                  </div>
                                </div>
                              </div>
                              <!-- E entry-item -->

                              </div>
                            <!-- E entry-list --><!-- End_Module_89215 --></div>
                        <div class="module-more-down"><a href="<?php echo url('Cate/index',array('id'=>'78')); ?>" target="_blank">更多</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-3-1">
                    <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_QHDCPM89214M2" class="qhd_column_contain"><!-- Start_Module_89216 --><a name="31465" id="31465"></a>
                      <div class="module">
                        <div class="module-inner">
                          <div class="module-title module-title-default clearfix">
                            <div class="module-title-content clearfix">
                              <h3 style="background-image:url(<?php echo $temp_src; ?>/img/8bc3530a-ae6e-463a-b162-6f4321829196_32_32.png);" class="module-icon-default">关于我们</h3>
                            </div>
                          </div>
                          <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_ctr8921689216_mainArea" class="module-content"><!-- Start_Module_89216 -->
                            <div class="qhd-content">
                              <p><?php echo $aboutUs; ?></p>
                            </div>
                            <!-- End_Module_89216 --></div>
                          <div class="module-more-down"><a href="<?php echo url('Cate/index',array('id'=>'72')); ?>" target="_blank">更多</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-3-1 last">
                    <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_QHDCPM89214M3" class="qhd_column_contain"><!-- Start_Module_89217 --><a name="31466" id="31466"></a>
                      <div class="module">
                        <div class="module-inner">
                          <div class="module-title module-title-default clearfix">
                            <div class="module-title-content clearfix">
                              <h3 style="background-image:url(<?php echo $temp_src; ?>/img/0e7087f6-cb84-46c1-9844-1ed90199f941_32_32.png);" class="module-icon-default">技术服务</h3>
                            </div>
                          </div>
                          <div id="a1portalSkin_ctr8921489214_Column3C33A34A33_ctr8921789217_mainArea" class="module-content"><!-- Start_Module_89217 -->
                            <div class="qhd-content">
                              <p> <?php echo $technology; ?></p>
                            </div>
                            <!-- End_Module_89217 --></div>
                          <div class="module-more-down"><a href="<?php echo url('Cate/index',array('id'=>'76')); ?>" target="_blank">更多</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End_Module_89214 --></div>
          </div>
        </div>
      </div>
      <!-- end of page-width --></section>
    <!-- ==================== E main ==================== --><!-- ==================== S footer ==================== -->
   
     <footer class="footer">
      <div class="footer-main">
        <div id="a1portalSkin_footerAreaA" class="page-width clearfix"><!-- Start_Module_89208 --><a name="31438" id="31438"></a>
          <div class="module-default">
            <div class="module-inner">
              <div id="a1portalSkin_ctr8920889208_mainArea" class="module-content"><!-- Start_Module_89208 -->
                <div class="qhd-module">
                  <div class="column">
                    <?php if(is_array($bottom) || $bottom instanceof \think\Collection || $bottom instanceof \think\Paginator): if( count($bottom)==0 ) : echo "" ;else: foreach($bottom as $key=>$cate): ?>
                 <div class="col-5-1">
                      <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_QHDCPM89208M1" class="qhd_column_contain"><!-- Start_Module_89209 --><a name="31439" id="31439"></a>
                        <div class="module-default">
                          <div class="module-inner">
                            <div class="module-title module-title-default clearfix">
                              <div class="module-title-content clearfix">
                                <h3 style="" class=""><?php echo $cate['catename']; ?></h3>
                              </div>
                            </div>
                            <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_ctr8920989209_mainArea" class="module-content"><!-- Start_Module_89209 --><!-- S link-line -->
                              <div class="link link-block">
                                <ul>
                                  <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): if( count($cate['children'])==0 ) : echo "" ;else: foreach($cate['children'] as $key=>$vo): ?>
                                    <li><a href="
                                        <?php switch($cate['cate_attr']): case "0": ?><?php echo url('Cate/index',array('id'=>$cate['id'])); break; case "1": ?><?php echo url('Page/index',array('id'=>$cate['id'])); break; case "2": ?><?php echo $cate['link']; break; default: ?><?php echo $cate['link']; endswitch; ?>
                                      " target=""><span><?php echo $vo['catename']; ?></span></a></li>
                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                              </div>
                              <!-- E link-line --><!-- End_Module_89209 --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    <div class="col-5-2 last">
                      <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_QHDCPM89208M4" class="qhd_column_contain"><!-- Start_Module_89212 --><a name="31442" id="31442"></a>
                        <div class="module-default">
                          <div class="module-inner">
                            <div class="module-title module-title-default clearfix">
                              <div class="module-title-content clearfix">
                                <h3 style="" class="">广州某某生物科技有限公司</h3>
                              </div>
                            </div>
                            <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_ctr8921289212_mainArea" class="module-content"><!-- Start_Module_89212 -->
                              <div class="qhd-content">
                                <p> ICP备********号 &nbsp; &nbsp;Copyright © 2014-2016  Thinkphp5视频教程 版权所有 </p>
                                <p> <a style="display:none" href="http://www.chuanke.com/s2260700.html" title="Thinkphp5视频教程 - 最好的tp学习平台">Thinkphp5视频教程</a></p>
                                <p> <a href="http://www.chuanke.com/s2260700.html" target="_blank"><img alt="" src="<?php echo $temp_src; ?>/img/184210d2-c505-4ad4-8e62-8581f9c865ac.png" style="width: 35px; height: 35px;" /></a>&nbsp; &nbsp;<a href="http://t.qq.com" target="_blank"><img alt="" src="<?php echo $temp_src; ?>/img/09f4108c-a904-41dd-8ff8-71ce53d84771.png" style="width: 35px; height: 35px;" /></a></p>
                              </div>
                              <!-- End_Module_89212 --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End_Module_89208 --></div>
            </div>
          </div>
        </div>
      </div>
    </footer>




    <!-- ==================== E footer ==================== --><!-- ==================== S bottom ==================== -->
    <section class="bottom">
      <div id="a1portalSkin_bottomAreaA" class="QHDEmptyArea page-width clearfix"></div>
    </section>
    <!-- ==================== E bottom ==================== --></div>
  <!-- end of wrapper --><!-- S fixed-bottom  -->
  <div id="a1portalSkin_fixedBottomArea" class="QHDEmptyArea fixed-bottom"></div>
  <!-- E fixed-bottom  --><!-- S fixed-side -->
  <div id="a1portalSkin_fixed-left" class="QHDEmptyArea fixed-side fixed-left"></div>
  <!-- E fixed-side --><!-- S fixed-side -->
  <div id="a1portalSkin_fixed-right" class="fixed-side fixed-right"><!-- Start_Module_89218 --><a name="31467" id="31467"></a>
  <div class="module-default">
    <div class="module-inner">
      <div id="a1portalSkin_ctr8921889218_mainArea" class="module-content"><!-- Start_Module_89218 -->
        <div class="link-fixed-side">
          <ul>
            <li class="first"><a href="http://wpa.qq.com/msgrd?v=3&uin=1234567890&site=qq&menu=yes" class="link-name" target="_blank"><i style="background-image:url(<?php echo $temp_src; ?>/img/c125b589-e76e-49c0-98d7-e6401cb1c361_32_32_uniformfill.png);" alt="合作咨询"></i><span>合作咨询</span></a></li>
            <li class=""><a href="http://wpa.qq.com/msgrd?v=3&uin=1234567890&site=qq&menu=yes" class="link-name" target="_blank"><i style="background-image:url(<?php echo $temp_src; ?>/img/5d9e132e-a784-4456-8686-4419cc50e854_32_32_uniformfill.png);" alt="在线客服"></i><span>在线客服</span></a></li>
            <li class=""><a href="javascript:;" class="link-name" target=""><i style="background-image:url(<?php echo $temp_src; ?>/img/87389d6b-e02e-4c9b-8197-0ea992d705cc_32_32_uniformfill.png);" alt="服务电话"></i><span>服务电话</span></a>
              <div class="link-summary"><i class="arrow-section-r"></i>
                <div class="link-summary-content">
                  <div class="qhd-content">
                    <p style="text-align:center;">400-123-4567</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- End_Module_89218 --></div>
    </div>
  </div>
</div>

  <!-- E fixed-side --><!-- S popup -->
  <div id="popup" class="popup">
    <div class="popup-content not-animated" data-animate="fadeInDown">
      <div id="a1portalSkin_popup-area" class="QHDEmptyArea popup-content-wrapper"></div>
      <div class="popup-close-btn"><a href="javascript:;" title="关闭"><span>关闭</span></a></div>
    </div>
    <div class="popup-overlay"></div>
  </div>
  <!-- E popup --><!-- E go top -->
  <div class="gotop-wrapper"><a href="javascript:;" class="fixed-gotop gotop"></a></div>
  <!-- E go top -->
  <input name="ScrollTop" type="hidden" id="ScrollTop" />
  <input name="__a1portalVariable" type="hidden" id="__a1portalVariable" />
  <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="" />
</form>

<!-- 外部脚本 -->
<!--Thinkphp5视频教程（dede58.com）做最好的织梦整站模板下载网站--> 
</body>
</html>