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
$sql="select * from document";
$totalRows=getResultNum($sql);
$pageSize=7;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql = "select * from document limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件列表</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div class="details">               
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">文件名称</th>                               
                                <th width="10%">作者</th>
                                <th width="10%">下载次数</th>
                                <th width="20%">上传时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        	<?php 
                        	if (!$rows) {
                        		echo "没有文件！";
                        	} else {
                        		foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['docname'];?></td>
                                
                                <td><?php 
										echo $row['docauthor'];
									?></td>
								
                                <td><?php echo $row['downloadcounts'];?></td>
                                <td><?php echo $row['doctime'];?></td>
                                <td align="center">
                                	<a href="uploadDoc/<?php echo $row['docpath'];?>">下载</a>
                                	<input type="button" value="删除" onclick="delDocument(<?php echo $row['id'];?>)" class="btn" />              
                                </td>
                            </tr>
                            <?php endforeach;
							}
                            ?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="5"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
	function delDocument(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delDocument&id="+id;
			}
	}
</script>
</html>