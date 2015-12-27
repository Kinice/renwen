<?php

require_once "../include.php";
checkLogined();
// 得到所有 xuhaoXXX
$arr = $_POST;
$arr2['xuhao'] = $arr['xuhao'];
update("daoshi", $arr2,"teaid={$arr['id']}");

if(update("teacher", $arr,"id={$arr['id']}")){
		header("Location:sortTeacher.php");
	}else{
		//echo "编辑失败!<br/><a href='sortTeacher.php'>请重新修改</a>";
		header("Location:sortTeacher.php");
	}

?>