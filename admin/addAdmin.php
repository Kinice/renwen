<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加管理员</title>
</head>
<body>
<h3>添加管理员</h3>
<form action="doAddAdmin.php" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员账号</td>
		<td><input type="text" name="username" placeholder="账号（小于16个英文字母）"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password" placeholder="密码（小于16个字符）"/></td>
	</tr>
	<tr>
		<td align="right">管理员类型</td>
		<td>
			<select name="adminKind">
				<option value="1">超级管理员</option>
				<option value="2" selected="selected">新闻管理员</option>
				<option value="3">师资队伍管理员</option>
				<option value="4">人才培养管理员</option>
				<option value="5">学科建设管理员</option>
				<option value="6">学生天地管理员</option>
				<!--
				<option value="1">超级管理员</option>
				<option value="2" selected="selected">学院要闻栏目管理员</option>
				<option value="3">通知公告栏目管理员</option>
				<option value="4">本科教学栏目管理员</option>
				<option value="5">研究生教学栏目管理员</option>
				<option value="6">学术科研栏目管理员</option>
				<option value="7">学生管理栏目管理员</option>
				<option value="8">招聘就业栏目管理员</option>
				<option value="9">活动掠影栏目管理员</option>
				<option value="10">院办刊物栏目管理员</option>
				<option value="11">继续教育栏目管理员</option>
-->
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="添加管理员"/></td>
	</tr>
</table>
</form>
</body>
</html>
