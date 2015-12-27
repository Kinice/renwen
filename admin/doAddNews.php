<?php
require_once"../include.php";
checkLogined();
$arr = $_POST;
$uploadFile=uploadFile();

if($uploadFile&&is_array($uploadFile)){
	$arr['imgpath']=$uploadFile[0]['name'];
}else{
	return "添加失败";
}

$arr['lastedit'] = date("Y-m-d H:i:s");

/* Input data into database.*/
$row = insert("news", $arr);
if ($row) {
	echo "添加成功！<br /><a href='listNews.php'>查看图片列表</a><br />";
	echo "<a href='addNews.php'>继续添加</a>";
} else {
	echo "添加失败！<a href='addNews.php'>请重新添加</a>";
}
?>