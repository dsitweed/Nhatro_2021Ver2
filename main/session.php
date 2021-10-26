<?php
    //Start session
    session_start();

    //if the user is already logged -> Dashboard page
    if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true){
        header("location: dashboard.html");
    }
?>