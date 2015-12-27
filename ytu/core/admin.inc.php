<?php 
/**
 * 检查管理员是否存在
 * Created by Kinice 孙兆鹏
 * 2015 9 1
 * @param unknown_type $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkAdmin($sql){
	return fetchOne($sql);
}
/**
 * 检测是否有管理员登陆.
 */
function checkLogined(){
	if(!isset($_SESSION['adminId'])&&!isset($_COOKIE['adminId'])){
		alertMes("请先登陆","../admin_login.php");
	}
}
/**
 * 添加管理员
 */
function addAdmin(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(insert("admin",$arr)){
		$mes="添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}

/**
 * 得到所有的管理员
 */
function getAllAdmin(){
	
	$sql="select id,username,email from admin ";
	$rows=fetchAll($sql);
	return $rows;
}
function getAdminByPage($page,$pageSize=2){
	$sql="select * from admin";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select id,username,email from admin limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 编辑管理员
 */
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['kind'] = (int)$arr['kind'];
	if(update("admin", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listAdmin.php?id={$_SESSION['adminId']}'>查看管理员列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
	}
	return $mes;
}

/**
 * 删除管理员的操作
 */
function delAdmin($id){
	if(delete("admin","id={$id}")){
		$mes="删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
	}
	return $mes;
}

function editNews($id){
	$arr=$_POST;
	$arr['lastedit'] = date("Y-m-d H:i:s");
	if(update("news", $arr,"id={$id}")){
		$mes="编辑成功!<br/>";
	}else{
		$mes="编辑失败!<br/>";
	}
	return $mes;
}


function delNews($id) {
	if(delete("news","id={$id}")){
		$mes="删除成功!<br/><a href='listNews.php'>查看图片新闻列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listNews.php'>请重新删除</a>";
	}
	return $mes;
}

function delDocument($id) {
	if(delete("document","id={$id}")){
		$mes="删除成功!<br/><a href='listDocument.php'>查看文件列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listDocument.php'>请重新删除</a>";
	}
	return $mes;
}

function delTeacher($id){
	// 删除daoshi表对应的
	// 先得到要删除的数组，根据id == teaid
	delete("daoshi", "teaid={$id}");
	if(delete("teacher","id={$id}")){
		$mes="删除成功!<br/><a href='listTeacher.php'>查看教师信息列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listTeacher.php'>请重新删除</a>";
	}
	return $mes;
}

function delArticle($id){
	if(delete("article","id={$id}")){
		$mes="删除成功!<br/><a href='listArticle.php'>查看文章列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listArticle.php'>请重新删除</a>";
	}
	return $mes;
}

function delArticle2($id){
	if(delete("article","id={$id}")){
		$mes="删除成功!<br/><a href='pubdel.php'>查看文章列表</a>";
	}else{
		$mes="删除失败!<br/><a href='pubdel.php'>请重新删除</a>";
	}
	return $mes;
}

function pubArticle2($id) {
	//修改 tstatus属性为 1
	$arr['tstatus'] = 1;
	if(update("article", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='pubdel.php'>查看文章列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='pubdel.php'>重新修改</a>";
	}
	return $mes;
}

function hotArticle($id) {
	//修改 thot属性为 1
	$arr['thot'] = 1;
	if(update("article", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='hotArticle.php'>查看文章列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='hotArticle.php'>重新修改</a>";
	}
	return $mes;
}

function nothotArticle($id) {
	//修改thot属性为 0
	$arr['thot'] = 0;
	if(update("article", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='hotArticle.php'>查看文章列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='hotArticle.php'>重新修改</a>";
	}
	return $mes;
}

/**
 * 注销管理员
 */
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:../admin_login.php");
}
/**
 * 添加用户的操作
 */
function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=date("Y-m-d H:i:s");
	$uploadFile=uploadFile("../uploads");
	if($uploadFile&&is_array($uploadFile)){
		$arr['face']=$uploadFile[0]['name'];
	}else{
		return "添加失败<a href='addUser.php'>重新添加</a>";
	}
	if(insert("user", $arr)){
		$mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
	}else{
		$filename="../uploads/".$uploadFile[0]['name'];
		if(file_exists($filename)){
			unlink($filename);
		}
		$mes="添加失败!<br/><a href='addUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
	}
	return $mes;
}
/**
 * 删除用户的操作
 */
function delUser($id){
	$sql="select face from user where id=".$id;
	$row=fetchOne($sql);
	$face=$row['face'];
	if(file_exists("../uploads/".$face)){
		unlink("../uploads/".$face);
	}
	if(delete("user","id={$id}")){
		$mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
	}
	return $mes;
}
/**
 * 编辑用户的操作
 * @param int $id
 * @return string
 */
function editUser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("user", $arr,"id={$id}")){
		$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
	}
	return $mes;
}

function passArticle($id) {
	//把tpub改成1
	$arr['tpub'] = 1;
	if (update("article", $arr,"id={$id}")) {
		$mes="审批通过!<br/><a href='shenpiArticle.php' onclick='window.location.reload()'>查看审批文章列表</a>";
	} else {
		$mes="操作失败!<br/><a href='shenpiArticle.php'>请重新修改</a>";
	}
	return $mes;
}

function ReArticle($id) {
	//把tpub改成3
	$arr['tpub'] = 3;
	if (update("article", $arr,"id={$id}")) {
		$mes="审批拒绝!<br/><a href='shenpiArticle.php'>查看审批文章列表</a>";
	} else {
		$mes="操作失败!<br/><a href='shenpiArticle.php'>请重新修改</a>";
	}
	return $mes;
}
