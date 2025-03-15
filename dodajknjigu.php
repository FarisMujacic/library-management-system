<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "registration"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 

<?php 

  if (isset($_POST['submit'])) {

    $ime = $_POST['ime'];
    $autor = $_POST['autor'];
    $score = $_POST['score'];
    $slobodne = $_POST['slobodne'];
    $sql = "INSERT INTO `books`(`ime`, `autor`,  `score`, `slobodne`) VALUES ('$ime','$autor','$score','$slobodne')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
      echo "Knjiga je spasena.";
    }else{
      echo "Greška:". $sql . "<br>". $conn->error;
    } 
    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Dodaj knjigu</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Knjiga:</legend>

    Ime knjige:<br>

    <input type="text" name="ime">

    <br>



    Autor:<br>

    <input type="text" name="autor">

    <br>

    Kategorija:<br>

    <input type="text" name="score">

    <br>

    Broj slobodnih  :<br>

<input type="text" name="slobodne">

<br>
   

    <input type="submit" name="submit" value="Spasi">

  </fieldset>

</form>

</body>

</html>