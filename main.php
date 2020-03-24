<!DOCTYPE html>
<?php 
    if (!(isset($_SESSION))) {
        session_start();
    }
    if ($_SESSION['userIsLoggedIn'] !== true){ 
        header("Location:index.php");
        die();
    }
?>
    <html>
        <head>

            <title>Notes</title>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Import materialize.css-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        </head>

        <body>
            <div class = "container">
                <div class = "row">
                    <div class = "col s2 m2 l2">
                    </div> <!-- col -->
                    <div class = "col s8 m8 l8 center-in">
                        <h1 class = "inline">My Notes</h1>
                        <p>This app was created with HTML, CSS, JavaScript, and jQuery for front-end behavior, MaterializeCSS for styling, PHP for server-side scripting, and incorporates input field validation, session variables, AJAX, and an AWS RDS MySQL database connection for storing data. This app is running in a Linux environment created with AWS Elastic Beanstalk.
                    </div> <!-- col -->
                    <div class = "col s2 m2 l2 right-in">
                        <a id = "logout-button" class="waves-effect waves-light btn-small red">Log Out</a>
                    </div> <!-- col -->
                </div> <!-- row -->

                <div class = "row">
                    <div class = "col s12 m8 l8 left-in">
                    </div> <!-- col -->
                    <div class = "col s12 m4 l4 center-in">
                        <a id = "create-note" class="waves-effect waves-light btn-small modal-trigger" href="#create-note-modal"><i class="material-icons left">add</i>Create a Note</a>
                    </div> <!-- col -->
                </div> <!-- row -->

                <?php include('include/notes.php'); ?>
                <?php include('modals/create-modal.php'); ?>
                <?php include('modals/delete-success.php'); ?>
                <?php include('modals/create-success.php'); ?>
            </div>

            <!--JavaScript at end of body for optimized loading-->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="js/functions.js"></script>
        </body>
    </html>