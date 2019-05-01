<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy\PHPTutorial\WWW\cms\public/../application/install\view\index\step1.htm";i:1553947866;}*/ ?>
﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>童攀课堂提供最新版TPCMS官方安装程序</title>
<link href="/cms/public/static/install/style/install.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/cms/public/static/install/style/jquery.js"></script>
<!-- <script>
$(document).ready(function(){
	$('#next').on('click',function(){
		if (typeof($('.no').html()) == 'undefined'){
			$(this).attr('href','index.php?step=2');
		}else{
			alert($('.no').eq(0).parent().parent().find('td:first').html()+' 未通过检测!');
			$(this).attr('href','###');			
		}	
	});
});
</script> -->
</head>
<body>
<div class="header">
  <div class="layout">
    <div class="title">
      <h2>系统安装向导</h2>
    </div>
    <div class="version">版本: 目前最新版</div>
  </div>
</div>
<div class="main">
  <div class="step-box" id="step1">
    <div class="text-nav">
      <h1>Step.1</h1>
      <h2>开始安装</h2>
      <h5>检测服务器环境及文件目录权限</h5>
    </div>
    <div class="procedure-nav">
      <div class="schedule-ico"><span class="a"></span><span class="c"></span><span class="d"></span></div>
      <div class="schedule-point-now"><span class="a"></span><span class="c"></span><span class="d"></span></div>
      <div class="schedule-point-bg"><span class="a"></span><span class="c"></span><span class="d"></span></div>
      <div class="schedule-line-now"><em></em></div>
      <div class="schedule-line-bg"></div>
      <div class="schedule-text"><span class="a">检查安装环境</span><span class="c">创建数据库</span><span class="d">安装</span></div>
    </div>
  </div>
  <div class="content-box">
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      环境检查
      </caption>
      <tr>
        <th scope="col">项目</th>
        <th width="25%" scope="col">程序所需</th>
        <th width="25%" scope="col">最佳配置推荐</th>
        <th width="25%" scope="col">当前服务器</th>
      </tr>
      <?php if(is_array($envArr) || $envArr instanceof \think\Collection || $envArr instanceof \think\Paginator): $i = 0; $__LIST__ = $envArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$env): $mod = ($i % 2 );++$i;?>
            <tr>
        <td scope="row"><?php echo $env[0]; ?></td>
        <td><?php echo $env[1]; ?></td>
        <td><?php echo $env[2]; ?></td>
        <td><span class="yes"><i></i><?php echo $env[3]; ?></span></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
          </table>
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      目录、文件权限检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%" scope="col">所需状态</th>
        <th width="25%" scope="col">当前状态</th>
      </tr>
      <?php if(is_array($dirfileArr) || $dirfileArr instanceof \think\Collection || $dirfileArr instanceof \think\Paginator): $i = 0; $__LIST__ = $dirfileArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dirfile): $mod = ($i % 2 );++$i;?>
      <tr>
        <td><?php echo $dirfile[3]; ?></td>
        <td><span><?php echo $dirfile[1]; ?></span></td>
        <td><span class="yes"><i></i><?php echo $dirfile[2]; ?></span></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
          </table>
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      函数检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%" scope="col">所需状态</th>
        <th width="25%" scope="col">当前状态</th>
      </tr>
      <?php if(is_array($funArr) || $funArr instanceof \think\Collection || $funArr instanceof \think\Paginator): $i = 0; $__LIST__ = $funArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fun): $mod = ($i % 2 );++$i;?>
            <tr>
        <td><?php echo $fun[0]; ?></td>
        <td><span><?php echo $fun[1]; ?></span></td>
        <td><span class="yes"><i></i><?php echo $fun[2]; ?></span></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>     
          </table>
  </div>
  <div class="btn-box"><a href="<?php echo url('Index/index'); ?>" class="btn btn-primary">上一步</a><a href="<?php echo url('Index/step2'); ?>" id="next" class="btn btn-primary">下一步</a></div>
</div>
<div class="footer">
  <h6><a href="http://www.tongpankt.com" target="_blank"></a></h6>
</div></body>
</html>