<?php 
require_once '../include.php';

function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', 

$_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d

{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    }
    return $ip;
}

$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);

if (isset($_POST['autoFlag']))
	$autoFlag=$_POST['autoFlag'];
else
	$autoFlag = 0;

$sql="select * from admin where username='{$username}' and password='{$password}'";
$row=checkAdmin($sql);
if($row){
	//如果选了一周内自动登陆
	if($autoFlag){
		setcookie("adminId",$row['id'],time()+7*24*3600);
		setcookie("adminName",$row['username'],time()+7*24*3600);
		setcookie("adminKind",$row['kind'],time()+7*24*3600);
	}
	if ($row['nickname'] != '') {
		$_SESSION['adminName']=$row['nickname'];
	} else {
		$_SESSION['adminName']=$row['username'];
	}		
	$_SESSION['adminId']=$row['id'];
	$_SESSION['adminKind']=$row['kind'];
	//登陆次数加1
	$ip = get_client_ip();
	$loginlast = date("Y-m-d H:i:s");
	$logcounts = $row['logincouts'];
	$logcounts += 1;
	$sql = "update admin set logincouts=".$logcounts.", loginlast='".$loginlast."', loginip='".$ip."' where id=".$row['id'];
	mysql_query($sql);
	alertMes("登陆成功","index.php");
}else{
	alertMes("登陆失败，重新登陆","../admin_login.php");
}
