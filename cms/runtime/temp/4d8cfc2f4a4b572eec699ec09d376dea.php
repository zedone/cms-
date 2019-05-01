<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy\PHPTutorial\WWW\cms\public/../application/admin\view\archives\add.htm";i:1553611797;s:69:"D:\phpstudy\PHPTutorial\WWW\cms\application\admin\view\common\top.htm";i:1552823536;s:70:"D:\phpstudy\PHPTutorial\WWW\cms\application\admin\view\common\left.htm";i:1553328364;}*/ ?>
<!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
    <title>ThinkPHP5.0</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/cms/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->

    <link href="/cms/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/cms/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/animate.css" rel="stylesheet">


    <script src="/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="/cms/public/static/admin/style/jquery.js"></script>
    <script src="/cms/public/static/admin/style/summernote.js"></script>

    <script src="/cms/public/static/admin/style/bootstrap.js"></script>

    <!--Beyond Scripts-->
    <script src="/cms/public/static/admin/style/beyond.js"></script>

    <script src="/cms/public/static/admin/plus/layer/layer.js"></script>

    <script type="text/javascript" src="/cms/public/static/admin/plus/uploadify/jquery.uploadify.min.js"></script>
</head>
<body>
    <!-- 头部 -->
    <!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="/cms/public/static/admin/#" class="navbar-brand">
                    <small>
                            <img src="/cms/public/static/admin/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/cms/public/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Session::get('username'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Login/logout'); ?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Admin/edit',array('id'=>\think\Session::get('id'))); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

	<!-- /头部 -->


    <!-- /头部 -->

    <div class="main-container container-fluid">
        <div class="page-container">
                        <!-- Page Sidebar -->
           <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->

                     <!-- <li <?php if($con == 'Conf'): ?> class="open" <?php endif; ?>>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-briefcase"></i>
                            <span class="menu-text">网站配置</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                             <li>
                                <a href="<?php echo url('conf/conflst'); ?>">
                                    <span class="menu-text">
                                        配置管理                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('conf/lst'); ?>">
                                    <span class="menu-text">
                                        配置列表                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('conf/add'); ?>">
                                    <span class="menu-text">
                                        添加配置                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'Admin'): ?> class="open" <?php endif; ?>>
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">管理员</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('Admin/lst'); ?>">
                                    <span class="menu-text">
                                        管理列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'AuthRule'): ?> class="open" <?php endif; ?>>
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">权限管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('AuthRule/lst'); ?>">
                                    <span class="menu-text">
                                        权限列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('AuthGroup/lst'); ?>">
                                    <span class="menu-text">
                                        用户组列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('AuthGroupAccess/lst'); ?>">
                                    <span class="menu-text">
                                        权限分配列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'Cate'): ?> class="open" <?php endif; ?>>
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa fa-list-ul"></i>
                            <span class="menu-text">栏目管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('cate/lst'); ?>">
                                    <span class="menu-text">
                                        栏目列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('cate/add'); ?>">
                                    <span class="menu-text">
                                        添加栏目                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'Archives'): ?> class="open" <?php endif; ?>>
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file-text"></i>
                            <span class="menu-text">文档管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('Archives/lst'); ?>">
                                    <span class="menu-text">
                                        文章列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('cate/lst'); ?>">
                                    <span class="menu-text">
                                        添加文章                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'Model'): ?> class="open" <?php endif; ?>>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-maxcdn"></i>
                            <span class="menu-text">模型管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('model/lst'); ?>">
                                    <span class="menu-text">
                                        管理模型                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('model/add'); ?>">
                                    <span class="menu-text">
                                        添加模型                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'ModelField'): ?> class="open" <?php endif; ?>>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-stack-exchange"></i>
                            <span class="menu-text">模型字段管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('ModelField/lst'); ?>">
                                    <span class="menu-text">
                                        模型字段列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('ModelField/add'); ?>">
                                    <span class="menu-text">
                                        添加模型字段                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li <?php if($con == 'Note'): ?> class="open" <?php endif; ?>>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-stack-exchange"></i>
                            <span class="menu-text">采集</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('Note/lst'); ?>">
                                    <span class="menu-text">
                                        采集列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('Note/addListRules'); ?>">
                                    <span class="menu-text">
                                        采集                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li  <?php if($con == 'Adpos' || $con == 'Advertisement'): ?> class="open" <?php endif; ?>>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-stack-exchange"></i>
                            <span class="menu-text">广告管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('Adpos/lst'); ?>">
                                    <span class="menu-text">
                                        广告位管理                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('Advertisement/lst'); ?>">
                                    <span class="menu-text">
                                        广告管理                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa fa-gear"></i>
                            <span class="menu-text">系统</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/cms/public/static/admin/admin/document/index.html">
                                    <span class="menu-text">
                                        配置                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->

                    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>

                     <li <?php
                         $arr=explode('/',$vo['name']);
                         $pcon=$arr[0];
                         if($pcon==$con){
                                 echo "class='active open'";
                         }
                     ?>  >
                        <a href="/cms/public/static/admin/#" class="menu-dropdown">
                            <i class="menu-icon fa <?php echo $vo['icon']; ?>"></i>
                            <span class="menu-text"><?php echo $vo['title']; ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo1): ?>
                            <li>
                                <a href="<?php echo url($vo1['name']); ?>">
                                    <span class="menu-text">
                                        <?php echo $vo1['title']; ?>                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                                <ul class="submenu">
                                    <?php if(is_array($vo1['children']) || $vo1['children'] instanceof \think\Collection || $vo1['children'] instanceof \think\Paginator): if( count($vo1['children'])==0 ) : echo "" ;else: foreach($vo1['children'] as $key=>$vo2): ?>
                                    <li>
                                        <a href="<?php echo url($vo2['name']); ?>">
                                            <span class="menu-text">
                                                    <?php echo $vo2['title']; ?>                            </span>
                                            <i class="menu-expand"></i>
                                        </a>
                                    </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>


                </ul>
                <!-- /Sidebar Menu -->
            </div>

            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li>
                        <a href="#">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('archives/lst'); ?>">文章列表</a>
                    </li>
                                        <li class="active">添加文章</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增文章</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                         <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                            <div class="col-sm-6">

                                    <span class="form-control"><?php echo $catelst['catename']; ?> </span>
                                    <input type="hidden" name="cate_id" value="<?php echo $catelst['id']; ?>">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">所属模型</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="model_id" placeholder="" name="model_id" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div> -->

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">文章标题</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="title" placeholder="" name="title" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">关键词</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" style="min-height: 60px;" name="keywords"></textarea>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <!-- 1文本输入，2单选，3多选，4下拉菜单，5文本域，6附件 7浮点，8整型，9长文本 -->
                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">描述</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" style="min-height: 60px;" name="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="writer" placeholder="" name="writer" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">来源</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="source" placeholder="" name="source" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">缩略图</label>
                            <div class="col-xs-4">
                                        <label style="float: left;">
                                            <!-- <div id="myId" class="dropzone"></div> -->
                                            <span id="uploadify"></span>
                                            <div class="col-xs-4"  id="cateimg"></div>

                                            <input name="litpic" type="hidden" value="">
                                            <!--  <div id="uploadify"></div> -->
                                        </label>
                                         <label style="float: left;">
                                            <!-- <div id="myId" class="dropzone"></div> -->

                                            <div class="uploadify-button btn btn-azure" id="delimg"><span class="fa  fa-rotate-left">&nbsp;&nbsp;撤销</span></div>
                                        </label>

                                    </div>

                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">属性</label>
                            <div class="col-sm-6">
                                <label>
                                    <input type="checkbox" class="colored-danger" name="attr" checked="checked">
                                    <span class="text">Danger</span>
                                </label>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">内容</label>
                            <div class="col-sm-6">

                                 <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <div class="widget flat radius-bordered">

                                                <div class="widget-body" name="content">
                                                    <div class="widget-main no-padding">

                                                            <textarea id="summernote"  name="content"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            </div>

                        </div>

                        <!-- 自定义字段开始 -->
                        <?php if(is_array($modelField) || $modelField instanceof \think\Collection || $modelField instanceof \think\Paginator): $i = 0; $__LIST__ = $modelField;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fieldLst): $mod = ($i % 2 );++$i;?>
                             <div class="form-group">
                                <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $fieldLst['field_cname']; ?></label>
                                <div class="col-sm-6">
                                    <?php switch($fieldLst['field_type']): case "1":case "7":case "8": ?>
                                            <input class="form-control"  placeholder="" name="<?php echo $fieldLst['field_ename']; ?>" type="text">
                                        <?php break; case "2": 
                                                $values=explode(',',$fieldLst['field_values']);
                                                foreach($values as $k =>$v):
                                            ?>
                                                <label>
                                                    <input name="<?php echo $fieldLst['field_ename']; ?>" value="<?php echo $v; ?>" type="radio" class="colored-blue">
                                                    <span class="text"><?php echo $v; ?>&nbsp;&nbsp;&nbsp;</span>
                                                </label>
                                            <?php endforeach;break; case "3": 
                                                $values=explode(',',$fieldLst['field_values']);
                                                foreach($values as $k =>$v):
                                            ?>
                                                <label>
                                                    <input type="checkbox" name="<?php echo $fieldLst['field_ename']; ?>[]" value="<?php echo $v; ?>" class="colored-blue" >
                                                    <span class="text"><?php echo $v; ?>&nbsp;&nbsp;&nbsp;</span>
                                                </label>
                                            <?php endforeach;break; case "4": ?>
                                            <select name="<?php echo $fieldLst['field_ename']; ?>">
                                                <?php
                                                    $values=explode(',',$fieldLst['field_values']);
                                                    foreach($values as $k =>$v):
                                                ?>
                                                    <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        <?php break; case "5": ?>
                                            <textarea class="form-control" style="min-height: 60px;" name="$fieldLst['field_ename']"></textarea>
                                        <?php break; case "6": ?>
                                            <input type="file" name="<?php echo $fieldLst['field_ename']; ?>">
                                        <?php break; case "9": ?>
                                            <!-- app\common  -->
                                           <?php echo get_summernote($fieldLst['field_ename']);break; default: ?><input class="form-control"  placeholder="" name="<?php echo $fieldLst['field_ename']; ?>" type="text">
                                    <?php endswitch; ?>
                                </div>

                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- 自定义字段结束 -->
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">点击量</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="click" placeholder="" name="click"  type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit"  class="btn btn-default">保存信息</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
    </div>

        <!--Basic Scripts-->

    <script src="/cms/public/static/admin/style/bootstrap.js"></script>

    <!--Beyond Scripts-->
    <script src="/cms/public/static/admin/style/beyond.js"></script>

     <script src="/cms/public/static/admin/plus/layer/layer.js"></script>
   <!--  -->
    <script src="/cms/public/static/admin/style/summernote.js"></script>
    <script>
        $('#summernote').summernote({ height: 300,width:800 });


        $(function () {

            //撤销操作
            var b=function(){
                var imgurl=$("input[name='litpic']").val();
                $.ajax({
                    type:"post",
                    dataType:"json",
                    data:{img:imgurl},
                    url:"<?php echo url('archives/delimg'); ?>",
                    success:function(data){

                       if (data==1) {
                            $("#cateimgs").remove();
                            $("input[name='litpic']").val('');
                            return 1;

                       }
                       if (data==2) {
                            layer.msg('撤销失败');
                            return 2;
                       }

                    }

                });
            }

            $("#uploadify").uploadify({
                //指定swf文件
                'swf': "/cms/public/static/admin/plus/uploadify/uploadify.swf",
                //后台处理的页面
                'uploader': "<?php echo url('archives/upimg'); ?>",
                'progressData' : 'speed',
                //按钮显示的文字
                'buttonText': '上传缩略图',
                'buttonClass':'btn btn-azure',
                //显示的高度和宽度，默认 height 30；width 120
                //'height': 15,
                //'width': 80,
                //上传文件的类型  默认为所有文件    'All Files'  ;  '*.*'
                //在浏览窗口底部的文件类型下拉菜单中显示的文本
                 'fileTypeDesc': 'Image Files',
                //允许上传的文件后缀
                'fileObjName':'img',

                'onUploadSuccess':function(file,data,response) {

                    var imgsrc="/cms/public/upload/indexUpload/"+data;
                    var cateimg="<img height='100' id='cateimgs' src='"+imgsrc+"'>";
                    $("#cateimg").html(cateimg);
                    $("input[name='litpic']").val(data);
                 },
                 'onUploadStart':function(file){
                    var imgurl=$("input[name='litpic']").val();
                    if (imgurl) {
                        b();
                    }
                 }

            });
            $("#uploadify-button").removeAttr('style');


            //撤销按钮
            $("#delimg").click(function(){
                var imgurl=$("input[name='litpic']").val();
                if(!imgurl){
                      layer.msg('请先上传', {icon: 5});
                    // alert("请先上传");
                    return false;
                }
                //eg1
                layer.confirm('确定要撤销吗', {icon: 3, title:'提示'}, function(index){
                        b();
                       layer.msg('撤销成功' ,{icon: 1});

                });

            });

        });
    </script>


</body></html>
