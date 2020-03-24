<?php 

    session_start();
    session_unset();
    session_destroy();
    die();
    // The user is now logged out
    
?>