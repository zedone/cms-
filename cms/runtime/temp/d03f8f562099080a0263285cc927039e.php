<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy\PHPTutorial\WWW\cms\public/../application/install\view\index\step3.htm";i:1554034690;}*/ ?>
﻿<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>童攀课堂提供最新版TPCMS官方安装程序</title>
<link href="/cms/public/static/install/style/install.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/cms/public/static/install/style/jquery.js"></script>
<link href="/cms/public/static/install/style/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/cms/public/static/install/style/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/cms/public/static/install/style/jquery.mousewheel.js"></script>
<script type="text/javascript">
var scroll_height = 0;
function showmessage(message) {
	document.getElementById('license').innerHTML += message+"<br/>";
	document.getElementById("text-box").scrollTop = 500+scroll_height;
	scroll_height += 40;
}
$(document).ready(function(){
	//自定义滚定条
	$('#text-box').perfectScrollbar();
});
</script>
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
  <div class="step-box" id="step4">
    <div class="text-nav">
      <h1>Step.3</h1>
      <h2>安装数据库</h2>
      <h5>正在执行数据库安装</h5>
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
  <div class="text-box" id="text-box">
    <div class="license" id="license"></div>
  </div>
  <div class="btn-box"><a href="javascript:void(0);" id="install_process" class="btn btn-primary">正在安装 ...</a></div>
</div>
<div class="footer">
  <h6><a href="http://www.tongpankt.com/" target="_blank"></a></h6>
</div>

<script type="text/javascript">
    var license=document.getElementById("license");
    function showmsg(msg,classname){
      var p=document.createElement('p');
      p.innerHTML=msg;
      classname && p.setAttribute('class',classname);
      license.appendChild(p);
    }

</script>

</body></html>