<!DOCTYPE html>
<html>
<head>
	<title>Edit and Delete Users</title>
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

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Unesi ime osobe" title="Type in a name">

	<?php
	//Connect to database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "registration";

	$conn = mysqli_connect('localhost', 'root', '', 'registration');

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	//Check if book has been deleted
	if(isset($_GET['delete'])) {
		$id = $_GET['delete'];
		
		//Delete book from database
		$sql = "DELETE FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Obrisan korisnik";
		} else {
			echo "Nije se obrisao korisnik: " . mysqli_error($conn);
		}
	}
	
	//Check if form has been submitted
	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $brojposudenih = $_POST['brojposudenih'];
		$brojposudenih = $_POST['brojvracenih'];
		$brojposudenih = $_POST['ukupanbroj'];
		$brojposudenih = $_POST['razred'];

		
		//Update book in database
		$sql = "UPDATE users SET username='$username', email='$email', password='$password', brojposudenih='$brojposudenih', brojvracenih='$brojvracenih', ukupanbroj='$ukupanbroj', razred='$razred' WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			echo "Promjena spasena";
		} else {
			echo "Promjena se nije izvrsila: " . mysqli_error($conn);
		}
	}
	

	//Get data from database
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		//Display data in a table
		echo "<table border='1'>";
		
		echo "<tr><th>ID</th><th>Ime i prezime</th><th>Email</th><th>Sifra</th><th>Broj posudenih</th><th>Broj vracenih</th><th>Ukupan broj</th><th>Razred</th><th>Izmijeni</th><th>Obrisi</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<form method='post'>";
            echo "<tr>";
            echo "<td><input type='text' name='id' value='" . $row["id"] . "' readonly></td>";
            echo "<td><input type='text' name='username' value='" . $row["username"] . "'></td>";
            echo "<td><input type='text' name='email' value='" . $row["email"] . "'></td>";
            echo "<td><input type='text' name='password' value='" . $row["password"] . "'></td>";
            echo "<td><input type='text' name='brojposudenih' value='" . $row["brojposudenih"] . "'></td>";
			echo "<td><input type='number' name='brojvracenih' value='" . $row["brojvracenih"] . "'></td>";
			echo "<td><input type='number' name='ukupanbroj' value='" . $row["ukupanbroj"] . "'></td>";
			echo "<td><input type='number' name='razred' value='" . $row["razred"] . "'></td>";

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

	
	


