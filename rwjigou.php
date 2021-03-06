<!doctype html>
<html>
<?php
require_once("conn.php");
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
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span>&nbsp;学院概况</p>
            <ul class="nav nav-stacked">
                <li ><a href="rwgaikuang.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学院简介</a></li>
                <li ><a href="rwleader.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;现任领导</a></li>
                <li><a href="rwjigou.php"   class="activea">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机构设置</a></li>
                <li><a href="rwtongzhi.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;通知公告</a></li>
            </ul>
        </div>
    </div>
    <!--MainNewsContainer-->
    <?php
    $sql1="select * from edit03 limit 1";
    $info=mysql_query($sql1,$con);
    while ($row = mysql_fetch_array($info)) {
    ?>
    <div id = "mainnewscontainer" >
        <div id = "title1" >
            <p> 机构设置</p>
        </div >
        <div id = "news" >
            <?php
            echo $row["content"];
            ?>
            <!--  -->
        </div >
        <?php
        }
        ?>
    </div>
    <div class="clear"></div>
</div>
<div class="top" >
    <a href="#" onMouseOver="change1(this)" onMouseOut="change2(this)" id="t">TOP<span class="glyphicon glyphicon-arrow-up"></span></a>
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

<script type="text/javascript">
    $('#myAffix').affix({
        offset: {
            top: 100,
            bottom: function () {
                return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    })
</script>
<script type="text/javascript">
    function change1(top){
        top.innerHTML="回到顶部";
        var cha=document.getElementById("t");
        cha.style.fontSize="10px";
    }
    function change2(top){
        top.innerHTML="TOP<span class='glyphicon glyphicon-arrow-up'></span>";
        var cha=document.getElementById("t");
        cha.style.fontSize="10px";
    }
</script>
</body>
</html>
