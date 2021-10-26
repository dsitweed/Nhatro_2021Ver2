<?php
    session_start();// De dam bao su dung cung 1 session
    session_destroy();
    header("location:../index.php");
?>