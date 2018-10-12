<html>
	<head>
		<title>Login</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
	</head>
	<body>
		<div id="login_box">
			<form action="DBaccess.php" method="post">
				<input type="email" id="textbox_username" class="textboxes" name="email" placeholder="username" required autofocus></br>
				<input type = "password" id="textbox_password" class="textboxes" name="password" placeholder="password" required><br>
				<a id="link_pwvergessen" href="#" onclick="doSomething();">Forgot password?</a>
                                
                                <button type="submit" id="btn_login" name="login">Login</button>
			</form>
		</div>
	</body>
</html>