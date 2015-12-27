<?php
require_once '../include.php';
checkLogined();
$arr['content'] = $_POST['content'];
$arr['lastedit'] = date("Y-m-d H:i:s");
$id = $_REQUEST['id'];

if(update("edit04", $arr,"id={$id}")){
		echo "编辑成功!<br/><a href='edit04.php'>查看</a>";
	}else{
		echo "编辑失败!<br/><a href='edit04.php'>请重新修改</a>";
	}
?>