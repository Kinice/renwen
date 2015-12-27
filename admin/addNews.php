<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加图片新闻信息</title>
</head>
<body>
<h3>添加图片新闻信息</h3>
<form action="doAddNews.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right" width="17%">新闻标题</td>
		<td><input type="text" name="title" placeholder="请输入新闻标题"/></td>
	</tr>
	<tr>
		<td align="right">大图片</td>
		<td><input type="file" name="face" /></td>
	</tr>
	<tr>
		<td align="right">详细信息</td>
		<td>
			<textarea name="ndesc"  style="width:100%;height:300px;"></textarea>
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