<?php
require_once "../include.php";
checkLogined();

$sql="select * from edit06 where id=1";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加文章</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        
</script>

</head>
<body>
<h3>学院简介</h3>
<form action="doEdit06.php?id=<?php echo $row['id'];?>" method="post" name="myForm">
<table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">学生组织</td>
		<td>
			烟台大学人文学院-学生组织
		</td>
	</tr>
	<tr>
		<td align="right">内容</td>
		<td>
			<textarea name="content" id="editor_id" style="width:100%;height:300px;"><?php echo $row['content'];?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" value="修改" />
		</td>
	</tr>

</table>
</form>
</body>
</html>
