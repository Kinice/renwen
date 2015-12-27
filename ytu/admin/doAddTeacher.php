<?php
require_once"../include.php";
checkLogined();
$arr = $_POST;
$uploadFile=uploadFile();
if($uploadFile&&is_array($uploadFile)){
	$arr['face']=$uploadFile[0]['name'];
}else{
	$arr['face']="default.jpg";
}

$arr['edittime'] = date("Y-m-d H:i:s");
/* Input data into database.*/
$row = insert("teacher", $arr);
if ($row) {
	// tianjiadaoshi
	if ($arr['shuoshi'] != null) {
		$daoshiarr = explode(",", $arr['shuoshi']);
		// tianjia dao table daoshi
		foreach ($daoshiarr as $asa) {
			$arr2['teaid'] = $row;
			$arr2['zhuanyeming'] = $asa;
			$row2 = insert("daoshi", $arr2);
		}
		
	}
	echo "添加成功！<br /><a href='listTeacher.php'>查看教师信息列表</a><br />";
	echo "<a href='addTeacher.php'>继续添加</a>";
} else {
	echo "添加失败！<a href='addTeacher.php'>请重新添加</a>";
}

?>
