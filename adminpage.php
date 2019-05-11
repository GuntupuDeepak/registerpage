<?php
session_start();
?>
<html>
<body>
<h1 align="center">ADMIN</h1>
<form align="center">
<a href="register.php">REGISTER USER</a>
<br>
<br>
<a href="delete.php">DELETE USER</a>
<br>
<br>
<a href="login.php">LOGOUT</a>
</form>

</body>
</html>
<?php
session_destroy();
?>