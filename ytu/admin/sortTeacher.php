<?php
require_once '../include.php';
checkLogined();

$sql="select * from teacher";
$rows = fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>教师排序</title>
</head>

<body>
<table class="table" cellspacing="0" cellpadding="0">
	<thead>
	    <tr>
	    	
	        <th width="7%">编号</th>
	        <th width="20%">姓名</th>  
	        <th width="20%">序号（1-n越小越靠前）</th>     
			<th width="20%">操作</th>
	    </tr>
	</thead>
	<tbody> 
	    <?php 
			if (!$rows) {
				echo "没有教师信息！";
			} else {
				foreach($rows as $row):?>
				<form method="post" action="doSortTeacher.php">
	    <tr>
	        <!--这里的id和for里面的c1 需要循环出来-->
	        <input type="hidden" value="<?php echo $row['id'];?>" name="id" />
	        <td align="center"><?php echo $row['id'];?></td>
	        <td align="center"><?php echo $row['teaname'];?></td>
	        <td align="center"><input type="text" name="xuhao" value="<?php echo $row['xuhao']; ?>"/></td>
			<td align="center"><input type="submit" value="修改" /></td>
        </tr>
		</form>
            <?php 
            		endforeach;
				}
				if ($rows) {
            ?>      
            <?php
				}
            ?>
        </tbody>
</table>
</body>
</html>
