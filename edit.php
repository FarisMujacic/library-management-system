<?php
// Uspostavljanje veze s bazom podataka
$user = 'root';
$password = '';
$database = 'registration';
$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}

// Izvlačenje podataka za uređivanje
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM books WHERE id=$id") or die($mysqli->error());
    if(count($result) == 1){
        $row = $result->fetch_array();
        $ime = $row['ime'];
        $autor = $row['autor'];
        $score = $row['score'];
        $slobodne = $row['slobodne'];
    }
}

// Ažuriranje podataka u bazi podataka
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $autor = $_POST['autor'];
    $score = $_POST['score'];
    $slobodne = $_POST['slobodne'];

    $mysqli->query("UPDATE books SET ime='$ime', autor='$autor', score='$score', slobodne='$slobodne' WHERE id=$id") or die($mysqli->error());

    // Preusmjeravanje na početnu stranicu nakon ažuriranja
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Uređivanje knjige</title>
    <link rel="stylesheet"  href="knjigeee.css">
    <link rel="icon" type="image/x-icon" href="https://freepngimg.com/thumb/book/2-books-png-image.png">
</head>
<body>
    <h2>Uređivanje knjige</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label>Ime knjige</label>
            <input type="text" name="ime" value="<?php echo $ime; ?>">
        </div>
        <div>
            <label>Autor knjige</label>
            <input type="text" name="autor" value="<?php echo $autor; ?>">
        </div>
        <div>
            <label>Score</label>
            <input type="number" name="score" value="<?php echo $score; ?>">
        </div>
        <div>
            <label>Slobodne knjige</label>
            <input type="number" name="slobodne" value="<?php echo $slobodne; ?>">
        </div>
        <div>
            <button type="submit" name="update">Ažuriraj</button>
        </div>
    </form>
</body>
</html>
