<?php
require_once "../include.php";
checkLogined();
$arr['username'] = $_POST['username'];
$arr['password'] = md5($_POST['password']);
$arr['kind'] = (int)$_POST['adminKind'];
$arr['regTime'] = date("Y-m-d H:i:s");

if(insert("admin",$arr)){
		echo "添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		echo "添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
?>