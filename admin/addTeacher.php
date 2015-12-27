<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加教师信息</title>
</head>
<body>
<h3>添加教师信息</h3>
<form action="doAddTeacher.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right" width="17%">姓名</td>
		<td><input type="text" name="teaname" placeholder="请输入教师姓名"/></td>
	</tr>
	
	<tr>
		<td align="right" width="17%">教师</td>
		<td>
			<select name="teakind">
				<option value="0">教授</option>
				<option value="1">副教授</option>
				<option value="2">讲师</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right" width="17%">导师</td>
		<td>
			<select name="isdaoshi">
				<option value="0">不是导师</option>
				<option value="1">导师</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td align="right">职称</td>
		<td><input type="text" name="teajob" placeholder="如：教授"/></td>
	</tr>
	<tr>
		<td align="right">性别</td>
		<td>
			<select name="teasex">
				<option value="male" selected="selected">男</option>
				<option value="female">女</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">学位</td>
		<td><input type="text" name="teastudy" placeholder=""/></td>
	</tr>
	<tr>
		<td align="right">学历</td>
		<td><input type="text" name="tealearn" placeholder=""/></td>
	</tr>
	<tr>
		<td align="right">职务</td>
		<td><input type="text" name="teawork" placeholder=""/></td>
	</tr>
	<tr>
		<td align="right">研究领域</td>
		<td><input type="text" name="teagreat" placeholder="如：宪法学"/></td>
	</tr>
	<tr>
		<td align="right">头像</td>
		<td><input type="file" name="face" /></td>
	</tr>
	<tr>
		<td align="right">学习工作经历</td>
		<td>
			<textarea name="workhistory"  style="width:100%;height:300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">个人主要成果</td>
		<td>
			<textarea name="result" style="width:100%;height:300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">荣誉奖励</td>
		<td>
			<textarea name="award" style="width:100%;height:300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">学术论文</td>
		<td>
			<textarea name="article" style="width:100%;height:300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit"  value="添加" />
			<input type="reset" value="重置" />
		</td>
	</tr>
</table>
</form>
</body>
</html>
