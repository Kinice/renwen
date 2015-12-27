<?php
require_once '../include.php';
checkLogined();
$arr['name'] = $_POST['name'];
$arr['phone'] = $_POST['phone'];
$arr['email'] = $_POST['email'];
$arr['qq'] = $_POST['qq'];
$id = $_REQUEST['id'];

if(update("xiaoyou", $arr,"id={$id}")){
		echo "编辑成功!<br/><a href='xiaoyou.php'>查看</a>";
	}else{
		echo "编辑失败!<br/><a href='xiaoyou.php'>请重新修改</a>";
	}
?>