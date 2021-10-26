<?php
    require_once "config.php";
    require_once "session.php";
    
    //Luu anh vao data image
    if ($_SERVER["REQUIRE_METHOD"] = "POST" && isset($_POST["submit"]))
    {
        if (isset($_POST["so-phong-trong"])){
            //Su dung session vao day
            $limit = $_POST["so-phong-trong"];
            $user = "root";
            $stmt = $conn->prepare("UPDATE `login` SET `so_phong_trong` = ? WHERE `user_name` = ?;");
            $stmt->bindParam(1,$limit);
            $stmt->bindParam(2,$user);

            $stmt->execute();
            echo "update so phong";
        }
        //var_dump($_POST);echo "<br/>";
        //var_dump($_FILES);
        //updata phong tro len database
        if (isset($_FILES["image"]))
        {
            $src = $_FILES["image"]["tmp_name"];
            $des = "../assets/img/database/".$_FILES["image"]["name"];
            //upload anh vao file 
            move_uploaded_file($src,$des);
            //Day anh vao database
            if (isset($_POST["so-phong"]) && isset($_POST["alt"])
            && isset($_POST["gia-phong"]))
            {
                $save = "./assets/img/database/".$_FILES["image"]["name"];;//Luu link toi anh 
                $so_phong = $_POST["so-phong"];
                $gia_phong = $_POST["gia-phong"];
                $alt = $_POST["alt"];
                $stmt = $conn->prepare("INSERT INTO images(image,so_phong,alt,gia_phong) VALUES (?,?,?,?);");
                $stmt->bindParam(1,$save);
                $stmt->bindParam(2,$so_phong);
                $stmt->bindParam(3,$alt);
                $stmt->bindParam(4,$gia_phong);

                $stmt->execute();
                echo "up phong tro";
            }
        }
        //header("location:./dashboard.html");
    }

    //Lay anh tu database
?>