<!DOCTYPE html>
<?php
require_once("conn.php");
require_once("ytu/lib/mysql.func.php");
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>烟台大学人文学院</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/basic.css" rel="stylesheet">           
        <link href="css/layout.css" rel="stylesheet">   
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<?php
	include_once("include2.php");
	?>
        <script src="js/myfocus-2.0.4.min.js"></script>
        <script type="text/javascript">
            myFocus.set({
                id:'myFocus',//ID
                pattern:'mF_fscreen_tb'//风格
            });
        </script>

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
	<div class="news-container">
        <div id="contain">
        <div id="myFocus"><!--焦点图盒子-->
			 <div class="loading"></div>
            <div class="pic"><!--图片列表-->
                <ul>
                    <?php
                    $sql="select * from news ORDER BY lastedit DESC limit 4 ";
                    $info=mysql_query($sql,$con);
                    while ($row = mysql_fetch_array($info)) {
                        $id=$row["id"];
                    ?>
                    <li><a href="<?php echo 'news.php?id='.$id ?>"><img id="tup" src="<?php  echo "ytu/admin/uploads/".$row['imgpath']; ?>" thumb="" alt="<?php echo $row['title']; ?>" text=" " /></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            </div>
        </div>

        <div class="panel-group" id="accordion">
    <div class="head-news1">
    <h3>学院要闻</h3>
    </div>
    <div id="mar">
    <marquee scrollAmount=2 width=500 height=264 direction=up onMouseOver="this.stop()" onMouseOut="this.start()">
    	<ul>
            <?php
            $sql1="select * from article WHERE tkind='2'AND tpub='1' AND tstatus='1' ORDER BY pubtime DESC limit 14";
            $info=mysql_query($sql1,$con);
            while ($row = mysql_fetch_array($info)) {
                $id1 = $row["id"];
                $time1 = substr($row["pubtime"], 0, 10);
                ?>
                <li><a href="<?php echo "article.php?id=" . $id1 ?>"><?php echo $row["title"]; ?></a><span class="date"><?php echo $time1; ?></span></li>
            <?php
            }
            unset($row);
            ?>
        </ul>
    </marquee>
    </div>
    </div>
    </div>
  	
  <div class="main-news-container">
 	 <div class="main-news">
  		<div class="head-news2">
    	<h3>研究生教育</h3>
        <a href="yanjiu.php" class="more">更多</a>
     </div>
         <?php
         $sql2="select * from article WHERE tkind='5' AND tpub='1' AND tstatus='1' ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql2,$con);
         while ($row = mysql_fetch_array($info)) {
         $id2 = $row["id"];
         $time2 = substr($row["pubtime"], 0, 10);
         ?>
       <p class="new"><a href="<?php echo "pcommon.php?id=" . $id2 ?>"><span class="glyphicon glyphicon-chevron-right"></span><?php $len=strlen($row["title"]);
					if($len<=45){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,45)."...";
						} ?></a><span class="date"><?php echo $time2; ?></span></p>
         <?php
         }
         ?>
 	</div>
 	 <div class="main-news">
  	<div class="head-news1">
    	<h3>本科教育</h3>
        <a href="benke.php" class="more">更多</a>
    </div>
         <?php
         $sql3="select * from article WHERE tkind='4' AND tpub='1' AND tstatus='1'  ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql3,$con);
         while ($row = mysql_fetch_array($info)) {
             $id3 = $row["id"];
             $time3 = substr($row["pubtime"], 0, 10);
             ?>
             <p class="new"><a href="<?php echo "pcommon.php?id=" . $id3 ?>"><span class="glyphicon glyphicon-chevron-right"></span><?php $len=strlen($row["title"]);
					if($len<=43){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,43)."...";
						} ?></a><span class="date"><?php echo $time3; ?></span></p>
         <?php
         }
         ?>
 	 </div>
 	 <div class="main-news">
  	<div class="head-news2">
    	<h3>通知公告</h3>
        <a href="rwtongzhi.php" class="more">更多</a>
 	   </div>
         <?php
         $sql4="select * from article WHERE tkind='3' AND tpub='1' AND tstatus='1'  ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql4,$con);
         while ($row = mysql_fetch_array($info)) {
             $id4 = $row["id"];
             $time4 = substr($row["pubtime"], 0, 10);
             ?>
             <p class="new"><a href="<?php echo "article.php?id=" . $id4 ?>"><span class="glyphicon glyphicon-chevron-right"></span><?php $len=strlen($row["title"]);
					if($len<=45){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,45)."...";
						} ?></a><span class="date"><?php echo $time4; ?></span></p>
         <?php
         }
         ?>
 	 </div>
  </div>
    <div class="main-news-container">
 	 <div class="main-news">
  		<div class="head-news1">
    	<h3>招聘就业</h3>
        <a href="rwzhaopin.php" class="more">更多</a>
     	</div>
         <?php
         $sql5="select * from article WHERE tkind='8' AND tpub='1' AND tstatus='1'  ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql5,$con);
         while ($row = mysql_fetch_array($info)) {
             $id5 = $row["id"];
             $time5 = substr($row["pubtime"], 0, 10);
             ?>
             <p class="new"><a href="<?php echo "pcommon.php?id=". $id5 ?>"><span class="glyphicon glyphicon-chevron-right"></span><?php $len=strlen($row["title"]);
					if($len<=45){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,45)."...";
						} ?></a><span class="date"><?php echo $time5; ?></span></p>
         <?php
         }
         ?>
 	</div>
 	 <div class="main-news">
  	<div class="head-news2">
    	<h3>学生管理</h3>
        <a href="rwxsgl.php" class="more">更多</a>
    </div>
         <?php
         $sql6="select * from article WHERE tkind='7' AND tpub='1' AND tstatus='1'  ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql6,$con);
         while ($row = mysql_fetch_array($info)) {
             $id6 = $row["id"];
             $time6 = substr($row["pubtime"], 0, 10);
             ?>
             <p class="new"><a href="<?php echo "stucommon.php?id=".$id6 ?>"><span class="glyphicon glyphicon-chevron-right"></span>
			 <?php $len=strlen($row["title"]);
					if($len<=45){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,45)."...";
						} ?>
						</a><span class="date"><?php echo $time6; ?></span></p>
         <?php
         }
         ?>
 	 </div>
 	 <div class="main-news">
  	<div class="head-news1">
    	<h3>学术科研</h3>
        <a href="rwxueshu.php" class="more">更多</a>
 	   </div>
         <?php
         $sql7="select * from article WHERE tkind='6' AND tpub='1' AND tstatus='1'  ORDER BY pubtime DESC limit 7";
         $info=mysql_query($sql7,$con);
         while ($row = mysql_fetch_array($info)) {
             $id7 = $row["id"];
             $time7 = substr($row["pubtime"], 0, 10);
             ?>
             <p class="new"><a href="<?php echo "common.php?id=".$id7 ?>"><span class="glyphicon glyphicon-chevron-right"></span><?php $len=strlen($row["title"]);
					if($len<=45){
					echo $row["title"];
					}else{
					echo substr($row["title"],0,45)."...";
						} ?></a><span class="date"><?php echo $time7; ?></span></p>
         <?php
         }
         ?>
 	 </div>
  </div>
</div>
<!--footer-->
<div id="footer-top">
	<div class="foot-top-content">
        <?php
            include_once("include4.php")
        ?>
    </div>
    <div class="clear"></div>
</div>

<div id="footer-bottom">

	<p class="s">地址：中国烟台市清泉路32号 邮政编码：264005</p>
    <p class="mi">电话：86-535-6902003 管理员邮箱：rwxyt@ytu.edu.cn<a href="ytu/admin_login.php">&nbsp;管理员登陆</a></p>
    <p class="l"> CopyRight&copy;2015 烟台大学人文学院 All Rights Reserved</p>

</div>
	<?php
	include_once("include3.php");
	?>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
		</script>
    </body>
</html>