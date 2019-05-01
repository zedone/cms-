<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//      Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
//路由
//
// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],           全局变量规则
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
return [

	'__pattern__' => [
        'id' => '\d+',
    ],  


	'cate/:id'=>'Cate/index',
	'page/:id'=>'Page/index',
	'art/:id'=>['Article/index',['method'=>'get','ext'=>'html'],['id'=>'\d+']],

];
