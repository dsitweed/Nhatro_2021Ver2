<?php
    $servername = "localhost";
    $dbname = "nhatro";
    $username = "root";
    $passwordDB = "";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$passwordDB);
        //Set char_set ve utf8 de hien thi tieng viet
        $conn->exec("set names utf8");
        header("Content-type: text/html; charset=utf-8");

        //set PDO error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Thanh cong my man";
    }catch (PDOException $e)
    {
        echo "Connection failed: ".$e->getMessage();
    }
?>

