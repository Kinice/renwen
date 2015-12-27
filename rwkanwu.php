<!doctype html>
<html>
<?php
require_once("conn.php");
$page=isset($_GET['page'])?intval($_GET['page']):1;
/* echo"<script language='javascript'>alert('$page');</script>";*/
$num=8;
$sql2="select * from article where tkind = 10";
$total=mysql_num_rows(mysql_query($sql2,$con));
$pagenum=ceil($total/$num);
if($page>$pagenum||$page==0){$offset = 1;$pagenum = 1;}
$offset=($page-1)*$num;
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->
</head>
<body>
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
    <div id="dao">
        <div class="dao1">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span>&nbsp;学生天地</p>
            <ul class="nav nav-stacked">
                <li ><a href="rwxuesheng.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学生组织</a></li>
                <li ><a href="rwxsgl.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学生管理</a></li>
                <li><a href="rwhuodong.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动掠影</a></li>
                <li><a href="rwkanwu.php" class="activea">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;院办刊物</a></li>
            </ul>
        </div>
    </div>
    <!--MainNewsContainer-->
    <div id="mainnewscontainer">
        <div id="title1">
            <p>院办刊物</p>
        </div>
        <div id="news">
            <div id="list">
                <ul>
                    <?php
                    $sql1="select * from article where tkind = 10  AND tpub='1' AND tstatus='1'  limit $offset,$num;";
                    $info=mysql_query($sql1,$con);
                    if($total==0){
                        echo "<h3>没有查询到结果！</h3>";
                    }
                    else {
                        while ($row = mysql_fetch_array($info)) {
                            $id = $row["id"];
                            $time = substr($row["pubtime"], 0, 10);
                            ?>
                            <li><span class="glyphicon glyphicon-chevron-right"></span> <a
                                    href="<?php echo "stucommon.php?id=" . $id ?>"><?php echo $row["title"]; ?></a><span
                                    class="date"><?php echo $time; ?></span></li>
                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div id="page">
            <ul class="pagination">
                <?php
                $last=($page==1)?"<li><a href='#'>&laquo;</a></li>":"<li><a href='rwkanwu.php?page=".($page-1)."'>&laquo;</a></li>";
                $next=($page==$pagenum)?"<li><a href='#'>&raquo;</a></li>":"<li><a href='rwkanwu.php?page=".($page+1)."'>&raquo;</a></li>";
                echo $last;
                for($i=1;$i<=$pagenum;$i++){
                    $show=($i!=$page)?"<li><a href='rwkanwu.php?page=".$i."'>$i</a></li>":"<li><a href='#'><b> $i</b></a></li>";
                    echo $show;
                }
                echo $next;
                ?>`
            </ul>
        </div>
    </div>
    <div class="clear"></div>

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
