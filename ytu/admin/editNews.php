<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$sql="select * from news where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>编辑图片新闻</title>
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
<h3>编辑图片新闻</h3>
<form action="doAdminAction.php?act=editNews&id=<?php echo $id;?>" method="post">
<table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right" width="17%">新闻标题</td>
		<td><input type="text" name="title" placeholder="<?php echo $row['title'];?>"/></td>
	</tr>
	<tr>
		<td align="right">大图片</td>
		<td><input type="file" name="face" /></td>
	</tr>
	<tr>
		<td align="right">详细信息</td>
		<td>
			<textarea name="ndesc"  id="editor_id" style="width:100%;height:300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit"  value="修改" />
			<input type="reset" value="重置" />
		</td>
	</tr>
</table>
</form>
</body>
</html>
