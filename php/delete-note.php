<?php 
    $servername = "localhost";
    $username = "anthony";
    $password = "n7fHmx71j5eCrM0U";
    $dbname = "notes";
    $idOfRowToDelete = $_POST['idOfRowToDelete'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM notes WHERE id = '$idOfRowToDelete'";
    $result = $conn->query($sql);

    echo $result;

?>