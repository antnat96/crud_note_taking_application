<?php 
    $servername = "localhost";
    $username = "anthony";
    $password = "n7fHmx71j5eCrM0Us";
    $dbname = "notes";
    $author = $_POST['author'];
    $contents = $_POST['contents'];
    $currentDate = new DateTime("now");
    $currentDate = $currentDate->format('Y-m-d');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO notes VALUES (LAST_INSERT_ID(), '$currentDate', '$currentDate', '$author', '$contents', null)";
    $result = $conn->query($sql);

    echo $result;

?>