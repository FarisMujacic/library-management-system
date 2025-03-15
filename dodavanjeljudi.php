<?php

$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "mydb"; 

$conn = new mysqli("localhost","root","","registration");

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



  if (isset($_POST['submit'])) {

    $username = $_POST['username'];

    $email = $_POST['email'];

    $password = $_POST['password'];

   
    
    $brojvracenih = $_POST['brojvracenih'];

    $ukupanbroj = $_POST['ukupanbroj'];

    $razred = $_POST['razred'];

    $sql = "INSERT INTO `users`(`username`, `email`, `password`, `brojvracenih`, `ukupanbroj`, `razred`) VALUES ('$username','$email','$password','$brojvracenih', '$ukupanbroj', '$razred')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    Username:<br>

    <input type="text" name="username">

    <br>

    Email:<br>

    <input type="text" name="email">

    <br>

    Password:<br>

    <input type="text" name="password">

    <br>

    Broj vracenih:<br>

    <input type="text" name="brojvracenih">

    <br>

    Ukupan broj:<br>

    <input type="text" name="ukupanbroj">

    <br>


    Razred:<br>

    <input type="text" name="razred">

    <br>

   

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>