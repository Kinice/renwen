<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加文件</title>
</head>
<body>
<h3>添加文件</h3>
<form action="doAddDocument.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">文件</td>
		<td><input type="file" name="document" /></td>
	</tr>
	<tr>
		<td align="right">文件名称</td>
		<td><input type="text" name="docname" /></td>
	</tr>
	
	<tr>
		<td colspan="2"><input type="submit"  value="上传文件"/></td>
	</tr>
</table>
</form>
</body>
</html>