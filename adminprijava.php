<!DOCTYPE html>
<html>
<head>
  <title>Školska biblioteka</title>
  <link rel="stylesheet" type="text/css" href="stylell.css">
  <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/book/2-books-png-image.png">
</head>
<body>
<div class="header">
  	<h2>Prijava</h2>
  </div>
<?php
if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($username == 'admin' && $password == 'pass') {
		header("Location: http://localhost/registration/adminindex.html");
		exit;
	} else {
		echo "Invalid username or password";
	}
}
?>

<form method="post">
	<label>Username:</label>
	<input type="text" name="username"><br><br>
	<label>Sifra:</label>
	<input type="password" name="password"><br><br>
	<input type="submit" name="login" value="Login">
</form>



</body>
</html>


