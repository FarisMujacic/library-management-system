<!DOCTYPE html>
<html>
<head>
	<title>Edit and Delete Books</title>
	<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


		table {
			border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
		}
		table th,
		table td, table th{
			text-align: left;
  padding: 12px;
		}
		
		
		table tr:hover {
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>
	<h1>Izmjena podataka</h1>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Unesi ime knjige" title="Type in a name">

	<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "registration";

	$conn = mysqli_connect('localhost', 'root', '', 'registration');

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	

	if(isset($_GET['delete'])) {
		$id = $_GET['delete'];
		

		$sql = "DELETE FROM books WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
	

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
        $ime = $_POST['ime'];
        $autor = $_POST['autor'];
        $score = $_POST['score'];
        $slobodne = $_POST['slobodne'];

		$sql = "UPDATE books SET ime='$ime', autor='$autor', score='$score', slobodne='$slobodne' WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Promjena spasena";
		} else {
			echo "Promjena se nije izvrsila: " . mysqli_error($conn);
		}
	}
	


	$sql = "SELECT * FROM books";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	
		echo "<table border='1'>";
		
		echo "<tr><th>ID</th><th>Ime knjige</th><th>Autor knjige</th><th>Kategorija</th><th>Dostupnost</th><th>Izmjena</th><th>Brisanje</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<form method='post'>";
            echo "<tr>";
            echo "<td><input type='text' name='id' value='" . $row["id"] . "' readonly></td>";
            echo "<td><input type='text' name='ime' value='" . $row["ime"] . "'></td>";
            echo "<td><input type='text' name='autor' value='" . $row["autor"] . "'></td>";
            echo "<td><input type='text' name='score' value='" . $row["score"] . "'></td>";
            echo "<td><input type='text' name='slobodne' value='" . $row["slobodne"] . "'></td>";
            echo "<td><input type='submit' name='submit' value='Update' onclick='return confirm(\"Da li ste sigurni da zelite da izmijenite podatke o knjizi?\")'></td>";
			echo "<td><a href='?delete=" . $row["id"] . "' onclick='return confirm(\"Da li ste sigurni da zelite da obrisete knjigu?\")'>Delete</a></td>";

            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }


	mysqli_close($conn);
	?>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
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

	
	


