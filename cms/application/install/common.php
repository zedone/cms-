<?php
# @Author: huang longpan
# @Date:   2019-02-02T15:51:04+08:00
# @Email:  2404099751@qq.com
# @Last modified by:   huang longpan
# @Last modified time: 2019-03-08T19:41:11+08:00



// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function check_env(){
	$envArr=array(
		'os'=>array('操作系统','无限制','Linux',PHP_OS,'success'),
		'php'=>array('php版本','5.3','5.4',PHP_VERSION,'success'),
		'gd'=>array('GD库','2.0','2.0','未知','success'),
		'upload'=>array('附件上传','无限制','2M','未知','success'),
		'disk'=>array('磁盘空间','100M','>100M','未知','success'),
	);

	//检查附件上传
	if(@ini_get('file_uploads')){
		$envArr['upload'][3]=ini_get('upload_max_filesize');
	}

	//获取磁盘空间
	if(function_exists('disk_free_space')){
		$envArr['disk'][3]=floor(disk_free_space(ROOT_PATH)/(1024*1024)).'M';
	}

	//检测GD库
	$tempArr=function_exists('gd_info') ? gd_info() : array();
	if(empty($tempArr['GD Version'])){
		$envArr['gd'][3]="未安装";
		$envArr['gd'][4]="error";
		session('error', true);
	}else{
		$envArr['gd'][3]=$tempArr['GD Version'];
	}
	unset($tempArr);

	return $envArr;
}

//函数支持
function check_function(){
	$funArr=array(

		'fsockopen'=>array('fsockopen','支持','支持','success'),
		'gethostbyname'=>array('gethostbyname','支持','支持','success'),
		'file_get_contents'=>array('file_get_contents','支持','支持','success'),
		'mysqli_connect'=>array('mysqli_connect','支持','支持','success'),
		'mb_convert_encoding'=>array('mb_convert_encoding','支持','支持','success'),
		'json_encode'=>array('json_encode','支持','支持','success'),
	);
	foreach ($funArr as $k => $v) {
		if(!function_exists($k)){
			$funArr[$k][2]="不支持";
			$funArr[$k][3]="error";
			session('error',true);
		}
	}

	return $funArr;
}

function check_dirfile(){
	$dirfileArr=array(
		array('dir','可写','可写','runtime','success'),
		array('dir','可写','可写','public/static/index','success'),
		array('file','可写','可写','application/config.php','success'),
		array('file','可写','可写','application/database.php','success'),
	);

	foreach ($dirfileArr as $k => $v) {
		if($v[0]=="dir"){         //如果是文件夹
			if (!is_writable(ROOT_PATH.$v[3])) {      //判断是否可写
				if(is_dir(ROOT_PATH.$v[3])){       //判断是否存在
					$dirfileArr[$k][2]="不可写";
					$dirfileArr[$k][4]='error';
					session('error', true);
				}else{
					$dirfileArr[$k][2]="不存在";
					$dirfileArr[$k][4]='error';
					session('error', true);
				}
			}
		}else{
			if (is_file(ROOT_PATH.$v[3])) {      //判断是否可写
				if(!is_writable(ROOT_PATH.$v[3])){       //判断是否存在
					$dirfileArr[$k][2]="不可写";
					$dirfileArr[$k][4]='error';
					session('error', true);
				}
			}else{
				$dirfileArr[$k][2]="不存在";
				$dirfileArr[$k][4]='error';
				session('error', true);
				}
		}
	}

	return $dirfileArr;
}


function showmsg($msg,$class){
	echo "<script type=\"text/javascript\"> showmsg(\"{$msg}\",\"{$class}\"); </script>";
	flush();
	ob_flush();
}


function create_tables($db,$prefix){
	$sql=file_get_contents(ROOT_PATH.'data/install.sql'); //读取文件
	$original_prefix=config('original_prefix');      //获取前缀
	$sql=str_replace("`{$original_prefix}","`{$prefix}",$sql); //替换
	$sql=explode(';',$sql);       //把读取到的数据变成数组

	showmsg('开始安装数据表......','green');

	foreach ($sql as $k => $v) {
		$v=trim($v);
		if(empty($v)){
			continue;
		}
		if(substr($v,0,12)=='CREATE TABLE'){
			$name=preg_replace("/^CREATE TABLE `(\w+)` .*/s","\\1",$v);
			$msg="创建数据表{$name}";
			if($db->execute($v) !== false){
				showmsg($msg.'...创建成功','green');
			}else{
				showmsg($msg.'...创建失败','red');
				session('error',true);
			}
		}else{
			$db->execute($v);
		}
	}

	showmsg("安装完成",'green');
	echo "<script type=\"text/javascript\">
			change();
	</script>";

}