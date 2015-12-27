<?php
require_once '../include.php';
checkLogined();
$arr = $_POST;
$arr['edittime'] = date("Y-m-d H:i:s");
$id = $_REQUEST['id'];

if(update("teacher", $arr,"id={$id}")){
		echo "编辑成功!<br/><a href='listTeacher.php'>查看教师信息章列表</a>";
	}else{
		echo "编辑失败!<br/><a href='listTeacher.php'>请重新修改</a>";
	}
?>