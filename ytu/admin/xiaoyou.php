<?php
require_once "../include.php";
checkLogined();

$sql="select * from xiaoyou where id=1";
$row=fetchOne($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>校友联谊</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />

</head>
<body>
<h3>校友联谊</h3>
<form action="doXiaoyou.php?id=<?php echo $row['id'];?>" method="post" name="myForm">
<table width="90%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">联系人姓名：</td>
		<td>
			<input type="text" name="name" value="<?php echo $row['name'];?>"></input>
		</td>
	</tr>
	<tr>
		<td align="right">联系人电话：</td>
		<td>
			<input type="text" name="phone" value="<?php echo $row['phone'];?>"></input>
		</td>
	</tr>
	<tr>
		<td align="right">联系人邮箱：</td>
		<td>
			<input type="text" name="email" value="<?php echo $row['email'];?>"></input>
		</td>
	</tr>
	<tr>
		<td align="right">qq群：</td>
		<td>
			<input type="text" name="qq" value="<?php echo $row['qq'];?>"></input>
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
