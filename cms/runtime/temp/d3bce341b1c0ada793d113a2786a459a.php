<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\phpstudy\PHPTutorial\WWW\cms\thinkphp\tpl\dispatch_jump.tpl";i:1553948523;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
    <script src="/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="/cms/public/static/admin/plus/layer/layer.js"></script>
    <style type="text/css">
        body .demo-class .layui-layer-title{background:#c00; color:#fff; border: none;}
        body .demo-class .layui-layer-btn{border-top:1px solid #E9E7E7}
        body .demo-class .layui-layer-btn a{background:#333;}
        body .demo-class .layui-layer-btn .layui-layer-btn1{background:#999;}

    </style>
</head>
<body>
    <input type="hidden" id="msg" name="msg" value="<?php echo(strip_tags($msg));?>">
    <input type="hidden" id="url" name="url" value="<?php echo($url);?>">
    <!-- <input type="hidden" name="wait" id="wait" value="<?php echo($wait);?>"> -->

    <script type="text/javascript">
        (function(){
            var msg=$("#msg").val();
            var url=$("#url").val();
            //var wait=$("#wait").val();
            layer.open({
              content: "<span style='font-size:30px;font-weight:600;'>"+msg+"</span><br></br>"+"<span style='font-size:25px;'>页面自动 <a id='href' href='<?php echo($url);?>'>跳转</a> 等待时间： <b id='wait'><?php echo($wait);?></b></span>",
              <?php switch ($code) { case "1": ?>
                    icon:1,
                    anim: 5,
                <?php break; case "0": ?>
                    skin: 'demo-class',
                    icon:5,
                    anim: 6,
                <?php break; }?>
              maxWidth:500,Height:800,
              yes: function(index, layero){
                location.href = url;
                layer.close(index);
              },
              cancel: function(index, layero){ 
                location.href = url;
                layer.close(index);
              }
            });
            var wait = document.getElementById('wait');
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = url;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
