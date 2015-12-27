<?php 
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$sql="select id,username,kind,nickname,password,email from admin where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>编辑管理员</title>
</head>
<body>
<h3>编辑管理员</h3>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">管理员名称</td>
		<td>
			<?php
				if ($_SESSION['adminKind'] == 1) {
			?>
			<input type="text" name="username" placeholder="<?php echo $row['username'];?>"/>
			<?php
				} else {
			?>
			<input type="text" name="username" value="<?php echo $row['username'];?>" disabled/>
			<?php
				}
			?>
		</td>
	</tr>
	<tr>
		<td align="right">管理员类型</td>
		<td>
			<select name="kind">
				<?php
				//如果是超级管理员修改：
				if ($_SESSION['adminKind'] == 1) {
					//如果是修改自己的信息
					if ($row['kind'] == 1) {
						//只显示超级管理员
						echo "<option value='1' selected='selected'>超级管理员</option>";
					} else {
						//否则显示除了超管的所有选项
				?>
				<option value="2" <?php if ($row['kind'] == 2) echo "selected='selected'";?>>新闻管理员</option>
				<option value="3" <?php if ($row['kind'] == 3) echo "selected='selected'";?>>师资队伍管理员</option>
				<option value="4" <?php if ($row['kind'] == 4) echo "selected='selected'";?>>人才培养管理员</option>
				<option value="5" <?php if ($row['kind'] == 5) echo "selected='selected'";?>>学科建设管理员</option>
				<option value="6" <?php if ($row['kind'] == 6) echo "selected='selected'";?>>学生天地管理员</option>
				
<!--
				<option value="2" <?php if ($row['kind'] == 2) echo "selected='selected'";?>>学院要闻栏目管理员</option>
				<option value="3" <?php if ($row['kind'] == 3) echo "selected='selected'";?>>通知公告栏目管理员</option>
				<option value="4" <?php if ($row['kind'] == 4) echo "selected='selected'";?>>本科教学栏目管理员</option>
				<option value="5" <?php if ($row['kind'] == 5) echo "selected='selected'";?>>研究生教学栏目管理员</option>
				<option value="6" <?php if ($row['kind'] == 6) echo "selected='selected'";?>>学术科研栏目管理员</option>
				<option value="7" <?php if ($row['kind'] == 7) echo "selected='selected'";?>>学生管理栏目管理员</option>
				<option value="7" <?php if ($row['kind'] == 8) echo "selected='selected'";?>>招聘就业栏目管理员</option>
				<option value="7" <?php if ($row['kind'] == 9) echo "selected='selected'";?>>活动掠影栏目管理员</option>
				<option value="7" <?php if ($row['kind'] == 10) echo "selected='selected'";?>>院办刊物栏目管理员</option>
				<option value="7" <?php if ($row['kind'] == 11) echo "selected='selected'";?>>继续教育栏目管理员</option>
-->
				<?php
						
					}
				} else {
					//只显示自己的管理员选项
					if ($row['kind'] == 2) {
						echo "<option value='2' selected='selected'>新闻管理员</option>";
					} else if ($row['kind'] == 3) {
						echo "<option value='3' selected='selected'>师资队伍管理员</option>";
					} else if ($row['kind'] == 4) {
						echo "<option value='4' selected='selected'>人才培养管理员</option>";
					} else if ($row['kind'] == 5) {
						echo "<option value='5' selected='selected'>学科建设管理员</option>";
					} else if ($row['kind'] == 6) {
						echo "<option value='6' selected='selected'>学生天地管理员</option>";
					}
/**
					if ($row['kind'] == 2) {
						echo "<option value='2' selected='selected'>学院要闻栏目管理员</option>";
					} else if ($row['kind'] == 3) {
						echo "<option value='3' selected='selected'>通知公告栏目管理员</option>";
					} else if ($row['kind'] == 4) {
						echo "<option value='4' selected='selected'>本科教学栏目管理员</option>";
					} else if ($row['kind'] == 5) {
						echo "<option value='5' selected='selected'>研究生教学栏目管理员</option>";
					} else if ($row['kind'] == 6) {
						echo "<option value='6' selected='selected'>学术科研栏目管理员</option>";
					} else if ($row['kind'] == 7) {
						echo "<option value='7' selected='selected'>学生管理栏目管理员</option>";
					} else if ($row['kind'] == 8) {
						echo "<option value='8' selected='selected'>招聘就业栏目管理员</option>";
					} else if ($row['kind'] == 9) {
						echo "<option value='9' selected='selected'>活动掠影栏目管理员</option>";
					} else if ($row['kind'] == 10) {
						echo "<option value='10' selected='selected'>院办刊物栏目管理员</option>";
					} else if ($row['kind'] == 11) {
						echo "<option value='11' selected='selected'>继续教育栏目管理员</option>";
					}
*/
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">管理员名称</td>
		<td><input type="text" name="nickname"  placeholder="<?php echo $row['nickname'];?>"/></td>
	</tr>
	<tr>
		<td align="right">管理员密码</td>
		<td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<td align="right">管理员邮箱</td>
		<td><input type="text" name="email" placeholder="<?php echo $row['email'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="编辑管理员"/></td>
	</tr>

</table>
</form>
</body>
</html>
