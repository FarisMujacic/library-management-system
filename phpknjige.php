<?php 



include('server.php');

if (isset($_GET['ime'])) {

    $ime = $_GET['ime'];

    $sql = "DELETE FROM `users` WHERE `id`='$id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>