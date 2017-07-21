<!DOCTYPE html>
<?php

session_start();
include("functions/function.php");

?>


<html>
<head>
	<title>social network</title>
</head>
<body>
	<form action="" method="post">
	<input type="email" name="email" placeholder="u_email"/>
	<input type="password" name="passw" placeholder="*********">
	<button name="login">login</button>
	</form>

	<form action="" method="post">
	<input type="name" name="username" placeholder="u_name">
	<input type="email" name="email" placeholder="email">
	<input type="password" name="password" placeholder="******">
	<input type="text" name="gender" placeholder="gender">
	<input type="text" name="country" placeholder="country">
	<input type="date" name="birthday" >
	<button name="sign_up">sign up</button>
	</form>

	<?php
		include("user_insert.php");

		include("login.php");
	?>


</body>
</html>