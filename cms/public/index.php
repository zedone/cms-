<?php
# @Author: huang longpan
# @Date:   2019-02-02T15:51:04+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-12T18:57:25+08:00



// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('ADMINIMG', __DIR__ . '/../public/upload/adminUpload/');
define('INDEXIMG', __DIR__ . '/../public/upload/indexUpload/');
define('CONF', __DIR__ . '/../public/upload/');

//广告图片路径
define('DELAD', __DIR__ . '/../public/static/index/ad/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
