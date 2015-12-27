<?php
require_once '../include.php';
checkLogined();
function showPaget($page,$totalPage,$where=null,$sep="&nbsp;",$i=null){
	$where=($where==null)?null:"&".$where;
	$url = $_SERVER ['PHP_SELF']."?content=pro";
	$index = ($page == 1) ? "首页" : "<a href='{$url}&page=1{$where}'>首页</a>";
	$last = ($page == $totalPage) ? "尾页" : "<a href='{$url}&page={$totalPage}{$where}'>尾页</a>";
	$prevPage=($page>=1)?$page-1:1;
	$nextPage=($page>=$totalPage)?$totalPage:$page+1;
	$prev = ($page == 1) ? "上一页" : "<a href='{$url}&page={$prevPage}{$where}'>上一页</a>";
	$next = ($page == $totalPage) ? "下一页" : "<a href='{$url}&page={$nextPage}{$where}'>下一页</a>";
	$str = "总共{$totalPage}页/当前是第{$page}页";
	$p = "";
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		
		if ($page == $i) {
			$p .= "[{$i}]";
		} else {
			$p .= "<a href='{$url}&page={$i}{$where}'>[{$i}]</a>";
		}
	}
 	$pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
 	return $pageStr;
}
if (isset($_REQUEST['page']))
	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
else
	$page = 1;
$sql="select * from teacher";
$totalRows=getResultNum($sql);
$pageSize=7;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql = "select * from teacher limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>教师信息列表</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div class="details">
	<div class="details_operation clearfix">
	    <div class="bui_select">
	    	<?php
	    		if ($_SESSION['adminKind'] == 1) :
	    	?>
	        <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addTeacher()">
	    	<?php
				endif;
	    	?>
	    </div>
	        
	</div>
    <!--表格-->
   
	<table class="table" cellspacing="0" cellpadding="0">
		<thead>
		    <tr>
		        <th width="7%">编号</th>
		        <th width="10%">姓名</th>  
		        <th width="10%">学位</th>                                 
		        <th width="10%">职务</th>
		        <th width="20%">修改日期</th>
		        <th>操作</th>
		    </tr>
		</thead>
		<tbody>
		   
		    	<?php 
			if (!$rows) {
				echo "没有教师信息！";
			} else {
				foreach($rows as $row):?>
		    <tr>
		        <!--这里的id和for里面的c1 需要循环出来-->
		        <td><?php echo $row['id'];?></td>
		        <td><?php echo $row['teaname'];?></td>
		        <td><?php echo $row['teastudy'];?></td>
		        <td><?php echo $row['teawork'];?></td>
		        <td><?php echo $row['edittime'];?></td>
		        <td align="center">
		        				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['teaname'];?>')">
		        				<input onclick="editTeacher(<?php echo $row['id'];?>)" type="button" value="修改" class="btn"  >
		        				<input onclick="delTeacher(<?php echo $row['id'];?>)" type="button" value="删除" class="btn">
		                        <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
		                    	<table class="table" cellspacing="0" cellpadding="0">
		                    		<tr>
		                    			<td width="20%" align="right">编号</td>
		                    			<td><?php echo $row['id'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">姓名</td>
		                    			<td><?php echo $row['teaname'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">教师</td>
		                    			<td>
											<?php
												if ($row['teakind'] == '0') {
													echo "教授";
												} else if ($row['teakind'] == '1') {
													echo "副教授";
												} if ($row['teakind'] == '2') {
													echo "讲师";
												}
											?>
										</td>
		                    		</tr>
						<tr>
		                    			<td width="20%"  align="right">导师</td>
		                    			<td>
											<?php
												if ($row['isdaoshi'] == '0') {
													echo "不是导师";
												} else if ($row['isdaoshi'] == '1') {
													echo "导师";
												}
											?>
										</td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">职称</td>
		                    			<td><?php echo $row['teajob'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">性别</td>
		                    			<td>
		                    				<?php 
		                    					if ($row['teasex'] == "male")
		                    						echo "男";
												else {
													echo "女";
												}
		                    				?>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">学位</td>
		                    			<td><?php echo $row['teastudy'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">学历</td>
		                    			<td><?php echo $row['tealearn'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">职务</td>
		                    			<td><?php echo $row['teawork'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">研究领域</td>
		                    			<td><?php echo $row['teagreat'];?></td>
		                    		</tr>
									<tr>
		                    			<td width="20%"  align="right">学习工作经历</td>
		                    			<td><?php echo $row['workhistory'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">主持或参与的研究项目</td>
		                    			<td><?php echo $row['result'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">代表性著作及论文</td>
		                    			<td><?php echo $row['article'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">科研奖励</td>
		                    			<td><?php echo $row['award'];?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">头像</td>
		                    			<td><?php echo "<img src='uploads/".$row['face']."' width='150px' />";?></td>
		                    		</tr>
		                    		<tr>
		                    			<td width="20%"  align="right">最后修改日期</td>
		                    			<td><?php echo $row['edittime'];?></td>
		                    		</tr>
		                    	</table>
		                    </div>
	                
	                </td>
	            </tr>
	            <?php endforeach;
				}
	            ?>
	            <?php if($totalRows>$pageSize):?>
	            <tr>
	            	<td colspan="6"><?php echo showPage($page, $totalPage);?></td>
	            </tr>
	            <?php endif;?>
	        </tbody>
    </table>
</div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"教师详情："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
</script>
</body>
<script type="text/javascript">

	function addTeacher(){
		window.location="addTeacher.php";	
	}
	function editTeacher(id){
			window.location="editTeacher.php?id="+id;
	}
	function delTeacher(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delTeacher&id="+id;
			}
	}
</script>
</html>
