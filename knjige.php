<?php
$user = 'root';
$password = '';
$database = 'registration';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 

if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 

$sql = " SELECT * FROM books ORDER BY score DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Spisak knjiga</title>
    <link rel="stylesheet"  href="knjigeee.css">
    <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/book/2-books-png-image.png">


</head>

</head>
<body>




<section>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Unesi ime knjige" title="Type in a name">


        <h1>&nbsp;&nbsp;Spisak knjiga</h1>
        <div style="overflow-x: auto;">
        <table id="myTable">
            <tr>
                <th>Ime knjige</th>
                <th>Autor knjige</th>
                <th>Kategorija</th>
                <th>Broj slobodnih knjiga</th>
            </tr>
  
            <?php

  
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
               
                <td><?php echo $rows['ime'];?></td>
                <td><?php echo $rows['autor'];?></td>
                <td><?php echo $rows['score'];?></td>
                <td><?php echo $rows['slobodne'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
   
   
   
   <script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
 
</html>