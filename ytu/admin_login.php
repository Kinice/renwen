<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>人文学院-后台登陆</title>
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/logindemo.css" />
	<link rel="stylesheet" type="text/css" href="css/logincss.css" />
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    
  </head>
  <body>
	<div class="container">
		<div id="menu_out">
			<div id="menu_in">
				<div id="menu">
					<UL id="nav">
						<li><a href="#" onmouseover="javascript:qiehuan(0)"
							id="mynav0" class="nav_off"><span>Login Page</span>
						</a>
						</li>
					</UL>
				</div>
			</div>
		</div>
		<div style="height: 40px;"></div>
		<section>
		<div id="container_demo">
			<div id="wrapper">
				<div id="login" class="animate form">
					<form action="admin/doLogin.php" method="post">
						<h1>人文网站管理系统</h1>
						<p>
							<label for="username" class="uname" data-icon="u"> 用户名: </label>
							<input id="username" name="username" required="required"
								type="text"/>
						</p>
						<p>
							<label for="password" class="youpasswd" data-icon="p"> 密码:
							</label> <input id="password" name="password" required="required"
								type="password" />
						</p>
						<p class="keeplogin">
							<input type="checkbox" name="autoFlag" id="loginkeeping"
								value="1" /> <label for="loginkeeping">保持登录</label>
						</p>
						<p class="login button">
							<input type="submit" value="登录" />
						</p>
						<p class="change_link"></p>
					</form>
				</div>
			</div>
		</div>
		</section>
	</div>
  </body>
</html>
