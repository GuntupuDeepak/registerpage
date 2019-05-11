<?php include('database.php') ?>

<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br>
<br>
<h1 align="center" >AUTOMATIC QUESTION PAPER GENERATOR</h1>
<br>
<br>
	<div class="header">
		<h2>Login Page</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="uname" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="upassword">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		
	</form>


</body>
</html>