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
$sql="select * from article where (tpub=2 or tpub=3) and tstatus=1 and tkind=".$_SESSION['adminKind'];
$totalRows=getResultNum($sql);
$pageSize=7;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql = "select * from article where (tpub=2 or tpub=3) and tstatus=1 and tkind=".$_SESSION['adminKind']." limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文章列表</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div class="details">

                    <!--表格-->
               		<?php 
                        	if (!$rows) {
                        		echo "没有需要审批的文章！";
                        	} else {
                        		?>
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">文章标题</th>                               
                                <th width="10%">审批状态</th>
                                <th width="10%">发布人</th>
                                <th width="20%">发布时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        	<?php
                        		foreach($rows as $row):?>
                        			<?php
                        				//未发布的只能自己看到哦
                        				if ($row['tstatus'] == 2 && strcmp($row['aid'], $_SESSION['adminId']) != 0) {
                        					continue;
                        				} 
                        			?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['id'];?></td>
                                <td>
									<?php 
									
											echo $row['title'];
														
									?>
								</td>
                                
                                <td><?php
                                		if ($row['tpub'] == 2) 
											echo "待审批";
										else if ($row['tpub'] == 3) 
											echo "审批拒绝";
									?></td>
								
                                <td><?php 
										//发布人，如果通过aid能查到，就更新数据，否则用最后的author
										$sql = "select username,nickname form admin where id=".$row['aid'];
										$name = fetchAll($sql);
										if ($name) {
											if ($name['nickname'] != null) {
												echo $name['nickname'];
												//更新数据
												$sql = "update article set author=".$name['nickname'];
												mysql_query($sql);
											} else {
												echo $name['username'];
												$sql = "update article set author=".$name['username'];
												mysql_query($sql);
											}
										} else {
											echo $row['author'];
										}							
									?></td>
									<td><?php echo $row['pubtime'];?></td>
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['title'];?>')">
					                            <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">文章编号</td>
					                        			<td><?php echo $row['id'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">文章标题</td>
					                        			<td><?php echo $row['title'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">文章类型</td>
					                        			<td><?php 
																if ($row['tkind'] == 2) {
																	echo "学院要闻";
																} else if ($row['tkind'] == 3) {
																	echo "通知公告";
																} else if ($row['tkind'] == 4) {
																	echo "本科教学";
																} else if ($row['tkind'] == 5) {
																	echo "研究生教学";
																} else if ($row['tkind'] == 6) {
																	echo "学术科研";
																} else if ($row['tkind'] == 7) {
																	echo "学生管理";
																} else if ($row['tkind'] == 8) {
																	echo "招聘就业";
																} else if ($row['tkind'] == 9) {
																	echo "活动掠影";
																} else if ($row['tkind'] == 10) {
																	echo "院办刊物";
																} else if ($row['tkind'] == 11) {
																	echo "继续教育";
																} else if ($row['tkind'] == 12) {
																	echo "校友联谊";
																}
															?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">文章状态</td>
					                        			<td><?php 
																if ($row['tstatus'] == 1) {
																	echo "已发布";
																} else if ($row['tstatus'] == 2) {
																	echo "未发布";
																} else if ($row['tstatus'] == 3) {
																	echo "已停用";
																} 
															?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">审批状况</td>
					                        			<td><?php 
																if ($row['tpub'] == 1) {
																	echo "审批通过";
																} else if ($row['tpub'] == 2) {
																	echo "待审批";
																} else if ($row['tpub'] == 3) {
																	echo "审批拒绝";
																}
															?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">发布人</td>
					                        			<td><?php echo $row['author'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">发布时间</td>
					                        			<td><?php echo $row['pubtime'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">阅读次数</td>
					                        			<td><?php echo $row['readcouts'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">最后修改时间</td>
					                        			<td><?php echo $row['lastedit'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">文章内容</td>
					                        			<td><?php
							                        			echo $row['tcontent'];
															?></td>
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
	      title:"管理员详情："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}

</script>
</body>

</html>
