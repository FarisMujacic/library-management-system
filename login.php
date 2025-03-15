<?php include('server.php') ?>
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
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		
  		<input type="text" name="username" placeholder="Unijeti ime i prezime" >
  	</div>
  	<div class="input-group">
  		
  		<input type="password" name="password" placeholder="Unijeti šifru">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Prijavi se</button>
  	</div>
  	<p>
  		Nisi se registrovao? <a href="register.php">Registruj se</a>
  	</p>
  </form>
</body>
</html>