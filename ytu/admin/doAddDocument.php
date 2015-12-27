<?php
require_once"../include.php";
checkLogined();
$arr = $_POST;
$uploadFile=uploadFile2();
if($uploadFile&&is_array($uploadFile)){
	$arr['docpath']=$uploadFile[0]['name'];
}else{
	return "上传失败";
}

$arr['doctime'] = date("Y-m-d H:i:s");

/* Author */
$sql = "select username from admin where id=".$_SESSION['adminId'];
$username = fetchOne($sql);
$arr['docauthor'] = $username['username'];

/* Input data into database.*/
$row = insert("document", $arr);
if ($row) {
	echo "添加成功！<br /><a href='listDocument.php'>查看文件列表</a><br />";
	echo "<a href='addDocument.php'>继续添加</a>";
} else {
	echo "添加失败！<a href='addDocument.php'>请重新添加</a>";
}
?>