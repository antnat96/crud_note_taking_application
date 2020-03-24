<?php 

    // Make sure the values from the post aren't empty
    if (!empty($_POST)) {
        if (!(empty($_POST["pw"]))) {
            $password = test_input($_POST["pw"]);
        }
    }
    else {
        die("Nice try.");
    }

    $servername = "aa14tla7xk15re7.cuaek3ju8uwd.us-east-1.rds.amazonaws.com";
    $username = "antnat96";
    $dbname = "notes";

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
        echo "Failed";
        die("Connection failed: " . $conn->connect_error);
    }

    // If connection is good
    else {
        
        // Send proper response to AJAX
        echo "Success";

        // Start the session
        session_start();

        // Set the session variables
        $_SESSION['userIsLoggedIn'] = true;
        $_SESSION['dbpw'] = trim($_POST['pw']);

        // The user is now logged in
    }
?>