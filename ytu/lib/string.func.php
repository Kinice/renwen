<?php 
/**
 * 生成验证码
 * Created by Kinice 孙兆鹏
 * 2015 9 1
 */
function buildRandomString($type=1,$length=4){
	if ($type == 1) {
		$chars = join ( "", range ( 0, 9 ) );
	} elseif ($type == 2) {
		$chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ) ) );
	} elseif ($type == 3) {
		$chars = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) );
	}
	if ($length > strlen ( $chars )) {
		exit ( "字符串长度不够" );
	}
	$chars = str_shuffle ( $chars );
	return substr ( $chars, 0, $length );
}

/**
 * 生成唯一字符串
 */
function getUniName(){
	return md5(uniqid(microtime(true),true));
}

/**
 * 得到文件的扩展名
 *
 */
function getExt($filename){
	$arr = explode(".",$filename);
	return strtolower(end($arr));
}
