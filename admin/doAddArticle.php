<?php
require_once "../include.php";
checkLogined();
$arr['aid'] = (int)$_POST['aid'];
$arr['title'] = $_POST['title'];
$arr['tkind'] = (int)$_POST['tkind'];
$arr['tstatus'] = (int)$_REQUEST['tstatus'];
$arr['tcontent'] = $_POST['tcontent'];
$arr['pubtime'] = date("Y-m-d H:i:s");
$arr['readcouts'] = 0;
$arr['lastedit'] = date("Y-m-d H:i:s");

if ($_SESSION['adminKind'] == 1) {
	//如果是超管，不用审批
	$arr['tpub'] = 1;
} else {
	//如果是其他管理员，需要审批
	$arr['tpub'] = 2;
}

//更改发布文章数量
$sql = "select publishcouts from admin where id=".$arr['aid'];
$row = fetchOne($sql);
$row['publishcouts'] = $row['publishcouts'] + 1;
update('admin', $row);

//$arr['author'] = null;
//发布人
$sql = "select username,nickname from admin where id=".$arr['aid'];
$row = fetchOne($sql);
if ($row['nickname'] != null) {
	$arr['author'] = $row['nickname'];
} else {
	$arr['author'] = $row['username'];
}

if(insert("article",$arr)){
		echo "添加成功!<br/><a href='addArticle.php'>继续添加</a>|<a href='listArticle.php'>查看文章列表</a>";
	}else{
		echo "添加失败!<br/><a href='addArticle.php'>重新添加</a>";
	}

?>