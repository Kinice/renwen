<?php 
require_once '../include.php';
checkLogined();
$act=$_REQUEST['act'];

if($act=="logout"){
	logout();
}elseif($act=="addAdmin"){
	$mes=addAdmin();
}elseif($act=="editAdmin"){
	$id=$_REQUEST['id'];
	$mes=editAdmin($id);
}elseif($act=="delAdmin"){
	$id=$_REQUEST['id'];
	$mes=delAdmin($id);
}elseif($act=="addCate"){
	$mes=addCate();
}elseif($act=="editCate"){
	$id=$_REQUEST['id'];
	$where="id={$id}";
	$mes=editCate($where);
}elseif($act=="delCate"){
	$id=$_REQUEST['id'];
	$mes=delCate($id);
}elseif($act=="addPro"){
	$mes=addPro();
}elseif($act=="editPro"){
	$id=$_REQUEST['id'];
	$mes=editPro($id);
}elseif($act=="delPro"){
	$id=$_REQUEST['id'];
	$mes=delPro($id);
}elseif($act=="addUser"){
	$mes=addUser();
}elseif($act=="delUser"){
	$id=$_REQUEST['id'];
		$mes=delUser($id);
}elseif($act=="editUser"){
	$id=$_REQUEST['id'];
	$mes=editUser($id);	
}elseif($act=="waterText"){
	$id=$_REQUEST['id'];
	$mes=doWaterText($id);
}elseif($act=="waterPic"){
	$id=$_REQUEST['id'];
	$mes=doWaterPic($id);
}elseif($act=="delArticle"){
	$id=$_REQUEST['id'];
	$mes=delArticle($id);
}elseif($act=="passArticle"){
	$id=$_REQUEST['id'];
	$mes=passArticle($id);
}elseif($act=="ReArticle"){
	$id=$_REQUEST['id'];
	$mes=ReArticle($id);
}elseif($act=="delArticle2") {
	$id=$_REQUEST['id'];
	$mes=delArticle2($id);
}elseif($act=="pubArticle2") {
	$id=$_REQUEST['id'];
	$mes=pubArticle2($id);
}elseif($act=="hotArticle") {
	$id=$_REQUEST['id'];
	$mes=hotArticle($id);
}elseif($act=="nothotArticle") {
	$id=$_REQUEST['id'];
	$mes=nothotArticle($id);
}elseif($act=="delTeacher") {
	$id=$_REQUEST['id'];
	$mes=delTeacher($id);
}elseif($act=="delDocument") {
	$id=$_REQUEST['id'];
	$mes=delDocument($id);
}elseif($act=="delNews") {
	$id=$_REQUEST['id'];
	$mes=delNews($id);
}elseif($act=="editNews") {
	$id=$_REQUEST['id'];
	$mes=editNews($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>