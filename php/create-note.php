<?php 

    if (!(isset($_SESSION['dbpw']))) {
        die("Nope.");
    }

    session_start();
    $servername = "aa14tla7xk15re7.cuaek3ju8uwd.us-east-1.rds.amazonaws.com";
    $username = "antnat96";
    $password = $_SESSION['dbpw'];
    $dbname = "notes";
    $currentDate = new DateTime("now");
    $currentDate = $currentDate->format('Y-m-d');
    $author = $contents = "";

    // Make sure the values from the post aren't empty
    if (!empty($_POST)) {
        if (!(empty($_POST['author']))) {
            $author = test_input($_POST['author']);
        }
        if (!(empty($_POST['author']))) {
            $contents = test_input($_POST['contents']);
        }
    }

    // Strip whitespace and remove htmlspecialchars
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO notes
            VALUES (null, '$currentDate', '$currentDate', '$author', '$contents', null)";
    $result = $conn->query($sql);

    $conn->close();

    echo $result;

?>