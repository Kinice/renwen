<!DOCTYPE html>
<html lang="en">
<?php
require_once("conn.php");
	$s=$_GET["searchinfo"];
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>烟台大学人文学院</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/basic.css" rel="stylesheet">           
        <link href="css/layout.css" rel="stylesheet">   
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/myfocus-2.0.4.min.js"></script>
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->
    </head>
<body>
<!--header-->
<div id="header">
	<div id="logo-container">
	<div id="logo">
	<img src="images/logo3.png"></div>
    <div id="logo2">
    <img src="images/dc.png"></div>
    </div>
    <?php
    include_once("include1.php");
    ?>
</div>
<!--mainbody-->
<div id="mainbody">
	<div id="search">
    	<h4>查询关键词：<?php echo $s; ?></h4>
    	 <?php
		 //分页
			$page=isset($_GET['page'])?intval($_GET['page']):1;
			$num=8;
			$sql1="select * from article where title like '%{$s}%' or tcontent like '%{$s}%'";
			
			//分页2
			$total=mysql_num_rows(mysql_query($sql1,$con));
			$pagenum=ceil($total/$num);
			if($page>$pagenum||$page==0){$offset = 1;$pagenum = 1;}
			$offset=($page-1)*$num;
			//end
			$sql2="select * from article where title like '%{$s}%' or tcontent like '%{$s}%' limit $offset,$num";
			$info=mysql_query($sql2,$con);
			while($row=mysql_fetch_array($info)){
				$row["title"]=str_replace($s,"<font color='red'>".$s."</font>",$row["title"]);
				$row["tcontent"]=str_replace($s,"<font color='red'>".$s."</font>",$row["tcontent"]);
				$id=$row["id"];
			?>
            <div id="scontent">
            
            	<a href="<?php 
				if($row["tkind"] == 2 || $row["tkind"] == 3){
					echo "article.php?id=".$id; 
				}elseif($row["tkind"] == 4 || $row["tkind"] == 5 || $row["tkind"] == 11 || $row["tkind"] == 8){
					echo "pcommon.php?id=".$id; 
				}elseif($row["tkind"] == 7 || $row["tkind"] == 9 || $row["tkind"] == 10){
					echo "stucommon.php?id=".$id; 
				}elseif($row["tkind"] == 6){
					echo "common.php?id=".$id; 
				}else{
					echo "xcommon.php?id=".$id;
				}
				?>"><?php echo $row["title"] ?></a>
                
            </div>
            <?php
			}
			?>
    </div> 
    <div id="page">
        	<ul class="pagination">
 			 <?php
                $last=($page==1)?"<li><a href='#'>&laquo;</a></li>":"<li><a href='search.php?page=".($page-1)."'>&laquo;</a></li>";
                $next=($page==$pagenum)?"<li><a href='#'>&raquo;</a></li>":"<li><a href='search.php?page=".($page+1)."'>&raquo;</a></li>";
                echo $last;
                for($i=1;$i<=$pagenum;$i++){
                    $show=($i!=$page)?"<li><a href='search.php?page=".$i."'>$i</a></li>":"<li><a href='#'><b> $i</b></a></li>";
                    echo $show;
                }
                echo $next;
                ?>
</ul>
        </div>
    </div>
</div>
<!--footer-->
<div id="footer-top">
    <div class="foot-top-content">
        <?php
        include_once("include4.php");
        ?>
    </div>
    <div class="clear"></div>
</div>

<div id="footer-bottom">
    <p class="s">地址：中国烟台市清泉路32号 邮政编码：264005</p>
    <p class="m">电话：86-535-6902003 管理员邮箱：rwxyt@ytu.edu.cn</p>
    <p class="l"> CopyRight&copy;2015 烟台大学人文学院 All Rights Reserved</p>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>