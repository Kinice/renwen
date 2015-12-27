<?php
require_once "../include.php";
checkLogined();
$id = $_REQUEST['id'];

$sql="select * from article where id='{$id}'";
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
<h3>修改文章</h3>
<form action="doEditArticle.php?id=<?php echo $id;?>" method="post" name="myForm">
	<input type="hidden" name="aid" value="<?php echo $_SESSION['adminId'];?>"  />
<table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">文章标题</td>
		<td>
			<input type="text" name="title" value="<?php echo $row['title']?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">文章类型</td>
		<td>
			<select name="tkind">
				<?php
					if ($row['tkind'] == 2) {
						echo "<option value='2'>学院要闻</option>";
					} else if ($row['tkind'] == 3) {
						echo "<option value='3'>通知公告</option>";					
					} else if ($row['tkind'] == 4) {
						echo "<option value='4'>本科教学</option>";
					} else if ($row['tkind'] == 5) {
						echo "<option value='5'>研究生教学</option>";
					} else if ($row['tkind'] == 6) {
						echo "<option value='6'>学术科研</option>";
					} else if ($row['tkind'] == 7) {
						echo "<option value='7'>学生管理</option>";
					} else if ($row['tkind'] == 8) {
						echo "<option value='8'>招聘就业</option>";
					} else if ($row['tkind'] == 9) {
						echo "<option value='9'>活动掠影</option>";
					} else if ($row['tkind'] == 10) {
						echo "<option value='10'>院办刊物</option>";
					} else if ($row['tkind'] == 11) {
						echo "<option value='11'>继续教育</option>";
					} else if ($row['tkind'] == 12) {
						echo "<option value='12'>校友联谊</option>";
					} 
					
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">内容</td>
		<td>
			<textarea name="tcontent" id="editor_id" style="width:100%;height:300px;"><?php echo $row['tcontent'];?></textarea>
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
