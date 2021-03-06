<html>
<head>
<meta charset="UTF-8" />
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
<title>登录</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Login" />
<meta name="keywords"
	content="html5, css3, form, switch, animation, :target, pseudo-class" />
<meta name="author" content="Guloop" />
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
							id="mynav0" class="nav_off"><span>人文学院后台登录</span>
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
					<form action="loginAction!checkLogin" method="post">
						<h1>登录</h1>
						<p>
							<label for="username" class="uname" data-icon="u"> 用户名 </label>
							<input id="username" name="staff.SAccount" required="required"
								type="text"/>
						</p>
						<p>
							<label for="password" class="youpasswd" data-icon="p"> 密码
							</label> <input id="password" name="staff.SPwd" required="required"
								type="password" />
						</p>
						<p class="keeplogin">
							<input type="checkbox" name="loginkeeping" id="loginkeeping"
								value="loginkeeping" /> <label for="loginkeeping">下次自动登录</label>
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