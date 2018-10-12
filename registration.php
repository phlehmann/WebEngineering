<html>
	<head>
		<title>Registration</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
	</head>
	<body>
		<div id="registration_box">
                    <form action="DBregistration.php" method="post">
				<input type="email" class="textboxes_left" name="username" placeholder="username" required autofocus>
				<input type="text" class="textboxes_right" name="institut" placeholder="school name" required autofocus>
                                <input type="password" class="textboxes_left" name="password" placeholder="password" required>
                                <input type="text" class="textboxes_right" name="strasse" placeholder="Strasse" required autofocus>
                                <input type="password" class="textboxes_left" name="password2" placeholder="repeat password" required>				
                                <input type="text" class="textboxes_right" name="ort" placeholder="Ort" required autofocus>
                                <input type="text" id="textbox_ort" class="textboxes_right" name="plz" placeholder="plz" required autofocus>
                                <button type="submit" id="btn_login" name="Register">Login</button>
			</form>
		</div>
	</body>
</html>