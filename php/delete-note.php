<?php 

    if (!(isset($_SESSION['dbpw']))) {
        die("Nope.");
    }

    session_start();
    $servername = "aa14tla7xk15re7.cuaek3ju8uwd.us-east-1.rds.amazonaws.com";
    $username = "antnat96";
    $password = $_SESSION['dbpw'];
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