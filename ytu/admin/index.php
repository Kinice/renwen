<?php
	require_once "../include.php";
	checkLogined();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>人文学院后台管理系统</title>
<link rel="stylesheet" href="styles/backstage.css">
<style>
	.xxd_label:hover {
		cursor: pointer;
	}
	ul li dl dd a:hover {
		color: orange;
	}
</style>
</head>

<body>
    <div class="head">
            <h3 class="head_text fr">人文学院后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您：<?php echo $_SESSION['adminName'];?>            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="icon icon_i">首页</a><span></span><a onclick="window.history.go(1)" href="#" class="icon icon_j">前进</a><span></span><a href="#" onclick="window.history.go(-1)" class="icon icon_t">后退</a><span></span><a onclick="window.location.reload()" href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">后台管理</div>
                <ul class="mList">
                	<?php
                		if ($_SESSION['adminKind'] == 1):
							$nums = "select * from article where tpub=2 and tstatus=1";
                	?>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu1','change1')" id="change1">+</span><label class="xxd_label" onclick="show('menu1','change1')">栏目管理员管理</label></h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="listAdmin.php?page" target="mainFrame">栏目管理员列表</a></dd>
                            <dd><a href="addAdmin.php" target="mainFrame">添加栏目管理员</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu2','change2')" id="change2" >+</span><label class="xxd_label" onclick="show('menu2','change2')">栏目文章管理</label></h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="listArticle.php" target="mainFrame">栏目文章列表</a></dd>
                            <dd><a href="addArticle.php" target="mainFrame">发表栏目文章</a></dd>
                            <dd><a href="shenpiArticle.php" target="mainFrame">审批栏目文章<?php $numRus = getResultNum($nums); if ($numRus != 0) {echo '('.$numRus.')';}?></a></dd>
                            <dd><a href="pubdel.php" target="mainFrame">发布保存文章</a></dd>
                            <dd><a href="hotArticle.php" target="mainFrame">文章加红功能</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu3','change3')" id="change3">+</span><label class="xxd_label" onclick="show('menu3','change3')">教师信息管理</label></h3>
                        <dl id="menu3" style="display:none;">
                        	<dd><a href="listTeacher.php" target="mainFrame">教师信息列表</a></dd>
                            <dd><a href="addTeacher.php" target="mainFrame">添加教师信息</a></dd>
                            <dd><a href="sortTeacher.php" target="mainFrame">教师排序</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu4','change4')" id="change4">+</span><label class="xxd_label" onclick="show('menu4','change4')">文件管理</label></h3>
                        <dl id="menu4" style="display:none;">
                        	<dd><a href="listDocument.php" target="mainFrame">文件列表</a></dd>
                            <dd><a href="addDocument.php" target="mainFrame">上传文件</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu5','change5')" id="change5">+</span><label class="xxd_label" onclick="show('menu5','change5')">展示栏目管理</label></h3>
                        <dl id="menu5" style="display:none;">
                            <dd><a href="edit01.php" target="mainFrame">学院简介</a></dd>
                            <dd><a href="edit02.php" target="mainFrame">现任领导</a></dd>
                            <dd><a href="edit03.php" target="mainFrame">机构设置</a></dd>
                            <dd><a href="edit04.php" target="mainFrame">重点学科</a></dd>
                            <dd><a href="edit05.php" target="mainFrame">学科带头人</a></dd>
                            <dd><a href="edit06.php" target="mainFrame">学生组织</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu6','change6')" id="change6">+</span><label class="xxd_label" onclick="show('menu6','change6')">图片新闻展示</label></h3>
                        <dl id="menu6" style="display:none;">
                        	<dd><a href="listNews.php" target="mainFrame">图片新闻列表</a></dd>
                            <dd><a href="addNews.php" target="mainFrame">添加图片新闻</a></dd>
                        </dl>
                    </li>
					<li>
                        <h3><span class="xxd_label" onclick="show('menu7','change7')" id="change7">+</span><label class="xxd_label" onclick="show('menu7','change7')">校友联谊信息修改</label></h3>
                        <dl id="menu7" style="display:none;">
                        	<dd><a href="xiaoyou.php" target="mainFrame">校友联谊信息修改</a></dd>
                        </dl>
                    </li>
                    <?php 
                    	endif;
						if ($_SESSION['adminKind'] == 4 || $_SESSION['adminKind'] == 5 || $_SESSION['adminKind'] == 6 || $_SESSION['adminKind'] == 7 || $_SESSION['adminKind'] == 8 || $_SESSION['adminKind'] == 9  || $_SESSION['adminKind'] == 10):
                   			$nums="select * from article where (tpub=2 or tpub=3) and tstatus=1 and tkind=".$_SESSION['adminKind'];
				    ?>
                    <li>
                    	<h3><span class="xxd_label" onclick="show('menu1','change1')" id="change1">+</span><label class="xxd_label" onclick="show('menu1','change1')">管理员</label>管理员</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="listAdmin.php?id=<?php echo $_SESSION['adminId'];?>" target="mainFrame">管理员信息</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span class="xxd_label" onclick="show('menu2','change2')" id="change2">+</span><label class="xxd_label" onclick="show('menu2','change2')">栏目管理</label></h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="listArticle.php"  target="mainFrame">栏目文章列表</a></dd>
                            <dd><a href="addArticle.php" target="mainFrame">发表栏目文章</a></dd>
                            <dd><a href="shenpiArticlei.php" target="mainFrame">待审批文章列表<?php $numRus2 = getResultNum($nums); if ($numRus2 != 0) {echo '('.$numRus2.')';}?></a></dd>
                            <dd><a href="pubdel.php" target="mainFrame">发布保存文章</a></dd>
                        </dl>
                    </li>
					<li>
                        <h3><span class="xxd_label" onclick="show('menu4','change4')" id="change4">+</span><label class="xxd_label" onclick="show('menu4','change4')">文件管理</label></h3>
                        <dl id="menu4" style="display:none;">
                        	<dd><a href="listDocument.php" target="mainFrame">文件列表</a></dd>
                            <dd><a href="addDocument.php" target="mainFrame">上传文件</a></dd>
                        </dl>
                    </li>
                    <?php 
                    	endif;
			if ($_SESSION['adminKind'] == 2) {
                    ?>
					<li>
                    	<h3><span class="xxd_label" onclick="show('menu1','change1')" id="change1">+</span><label class="xxd_label" onclick="show('menu1','change1')">管理员</label>信息</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="listAdmin.php?id=<?php echo $_SESSION['adminId'];?>" target="mainFrame">管理员信息</a></dd>
                        </dl>
                    </li>
					<li>
                        <h3><span class="xxd_label" onclick="show('menu3','change3')" id="change3">+</span><label class="xxd_label" onclick="show('menu3','change3')">图片新闻展示</label></h3>
                        <dl id="menu3" style="display:none;">
                        	<dd><a href="listNews.php" target="mainFrame">图片新闻列表</a></dd>
                            <dd><a href="addNews.php" target="mainFrame">添加图片新闻</a></dd>
                        </dl>
                    </li>
			<?php
			}
			if ($_SESSION['adminKind'] == 3) {
			?>	
			<li>
                        <h3><span class="xxd_label" onclick="show('menu3','change3')" id="change3">+</span><label class="xxd_label" onclick="show('menu3','change3')">教师信息管理</label></h3>
                        <dl id="menu3" style="display:none;">
                        	<dd><a href="listTeacher.php" target="mainFrame">教师信息列表</a></dd>
                            <dd><a href="addTeacher.php" target="mainFrame">添加教师信息</a></dd>
                        </dl>
                    </li>
					<li>
                        <h3><span class="xxd_label" onclick="show('menu4','change4')" id="change4">+</span><label class="xxd_label" onclick="show('menu4','change4')">文件管理</label></h3>
                        <dl id="menu4" style="display:none;">
                        	<dd><a href="listDocument.php" target="mainFrame">文件列表</a></dd>
                            <dd><a href="addDocument.php" target="mainFrame">上传文件</a></dd>
                        </dl>
                    </li>
			<?php
			}
			?>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>
