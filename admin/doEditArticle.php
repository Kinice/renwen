<?php
require_once '../include.php';
checkLogined();
$arr['aid'] = (int)$_POST['aid'];
$arr['title'] = $_POST['title'];
$arr['tcontent'] = $_POST['tcontent'];
$arr['lastedit'] = date("Y-m-d H:i:s");
$id = $_REQUEST['id'];
//发布人
$sql = "select username,nickname from admin where id=".$_SESSION['adminId'];
$row = fetchOne($sql);
if ($row['nickname'] != null) {
	$arr['author'] = $row['nickname'];
} else {
	$arr['author'] = $row['username'];
}
$arr['lastedit'] = date("Y-m-d H:i:s");
$sql = "select tpub from article where id=".$id;
$row = fetchOne($sql);
if ($row['tpub'] == 3) {
	if ($_SESSION['adminKind'] == 1)
		$arr['tpub'] = 1;
	else 
		$arr['tpub'] = 2;
}
if(update("article", $arr,"id={$id}")){
		echo "编辑成功!<br/><a href='listArticle.php'>查看文章列表</a>";
	}else{
		echo "编辑失败!<br/><a href='listArticle.php'>请重新修改</a>";
	}
?>