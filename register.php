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
  	<h2>Registracija</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  
  	  <input type="text" name="username" placeholder="Unijeti ime i prezime" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	 
  	  <input type="email" name="email" placeholder="Školski email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  
  	  <input type="password" name="password_1" placeholder="Unijeti šifru(8 karaktera)">
  	</div>
  	<div class="input-group">
  	 
  	  <input type="password" name="password_2" placeholder="Potvrdi svoju šifru">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registruj se</button>
  	</div>
  	<p>
  		Već si se registrovao? <a href="login.php">Prijavi se</a>
  	</p>
  </form>
</body>
</html>