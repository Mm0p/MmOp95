<!DOCTYPE html>
<html>
<head>
	<title>Login Screen</title>
</head>
<link rel="stylesheet" type="text/css" href="../global.css">
<link rel="stylesheet" type="text/css" href="stylesLogin.css">
<body>
	<div>
	<div class="newWindow">
		<div id="headerWindow"><p>Login</p></div>
		<div id="windowContent">
			<form action="loginCheck.php" method="get">
			<div class="submitButton">
  				<input class="buttonItself" type="submit" value="OK">
  			</div>
			<img src="../Img/Keys.png">
			<p>Type a name to identify yourself to Windows. Enter <br> a password if you have one. <br><br>Tip: if you change your password to nothing, <br>you won't get this prompt again at startup.</p>
			<div class="loginDetails">
				<label for="uName">Username:</label>
  				<input class="inputPass" type="text" id="uName" name="uName" placeholder="username"><br><br>
  				<label for="uPass">Password:</label>
  				<input class="inputPass" type="password" id="uPass" name="uPass" placeholder="password"><br>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>