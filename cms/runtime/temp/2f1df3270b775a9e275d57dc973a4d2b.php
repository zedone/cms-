<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\phpstudy\PHPTutorial\WWW\cms\public/../application/admin\view\adpos\lst.htm";i:1552396261;s:69:"D:\phpstudy\PHPTutorial\WWW\cms\application\admin\view\common\top.htm";i:1552823536;s:70:"D:\phpstudy\PHPTutorial\WWW\cms\application\admin\view\common\left.htm";i:1553328364;}*/ ?>
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
    <link id="beyond-link" href="/cms/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/cms/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/animate.css" rel="stylesheet">

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
                        <a href="<?php echo url('index/index'); ?>">系统</a>
                    </li>
                                        <li class="active">配置列表</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

<button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div  class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr>
                                <th class="text-center" width="6%">ID</th>
                                <th class="text-center">广告位名称</th>
                                <th class="text-center">广告位宽度</th>
                                <th class="text-center">广告位高度</th>
                                <th class="text-center" width="12%">操作</th>
                            </tr>
                        </thead>
                        <tbody id="row">
							<?php if(is_array($lst) || $lst instanceof \think\Collection || $lst instanceof \think\Paginator): $i = 0; $__LIST__ = $lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr id="tr_<?php echo $vo['id']; ?>">
                                <td align="center"><?php echo $vo['id']; ?></td>
                                <td align="center"><?php echo $vo['name']; ?></td>
                                <td align="center"><?php echo $vo['width']; ?></td>
                                <td align="center"><?php echo $vo['height']; ?></td>
                                <td  align="center">
                                    <a href="<?php echo url('edit',['id'=>$vo['id']]); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>

                                    <a confid="<?php echo $vo['id']; ?>" onclick="changedel(this);" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> ajax删除
                                    </a>
                                </td>
                            </tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>
                </div>
                <div>	<?php echo $lst->render(); ?>			</div>
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
    <script src="/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="/cms/public/static/admin/style/bootstrap.js"></script>
    <script src="/cms/public/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="/cms/public/static/admin/style/beyond.js"></script>
	    <script src="/cms/public/static/admin/plus/layer/layer.js"></script>
    <script type="text/javascript">

	function changedel(o){
		var confid=$(o).attr("confid");
		var mold=1;
		layer.open({
			  content: '确认删除该广告位及该广告位下的广告吗',
			  btn: ['确认', '仅删除广告位', '取消'],
			  yes: function(index, layero){
			   	ajaxdel(confid,mold);
			  },
			  btn2: function(index, layero){
			   mold=2;
			   ajaxdel(confid,mold);
			  },
			  btn3: function(index, layero){
			    //按钮【按钮三】的回调

			    //return false 开启该代码可禁止点击该按钮关闭
			  },
			  cancel: function(){
			    //右上角关闭回调

			    //return false 开启该代码可禁止点击该按钮关闭
			  }
			});
	}

	function ajaxdel(confid,mold){
	        $.ajax({
	            type:"post",
	            dataType:"json",
	            data:{id:confid,molds:mold},
	            url:"<?php echo url('del'); ?>",
	            success:function(data){
	                if(data==1){
	                    // $("#row").load("<?php echo url('conf/lst'); ?> #row");
	                    $("#tr_"+confid).remove();
	                }
	                if(data==0){
	                    alert("删除失败");
	                }
	            },
	            error:function(){
	                alert("删除失败");
	            },
	        //     complete: function () {
	        //         $("#row").load("<?php echo url('conf/lst'); ?> #row tr");
	        //         //window.location.reload();
	        //     },


	        });
	}

    // function changedel(o){
    //     if(confirm("确定删除数据")){
    //         var confid=$(o).attr("confid");
    //         $.ajax({
    //             type:"post",
    //             dataType:"json",
    //             data:{id:confid},
    //             url:"<?php echo url('del'); ?>",
    //             success:function(data){
    //                 if(data==1){
    //                     // $("#row").load("<?php echo url('conf/lst'); ?> #row");
    //                     $("#tr_"+confid).remove();
    //                 }
    //                 if(data==0){
    //                     alert("删除失败");
    //                 }
    //             },
    //             error:function(){
    //                 alert("删除失败");
    //             },
    //         //     complete: function () {
    //         //         $("#row").load("<?php echo url('conf/lst'); ?> #row tr");
    //         //         //window.location.reload();
    //         //     },
	//
	//
    //         });
    //     }
    // }
    </script>


</body></html>
