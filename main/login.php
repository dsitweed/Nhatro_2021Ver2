<?Php
    require_once "config.php";
    require_once "session.php";

    //Chi thuc hien khi request_method = post va da an dang nhap
    if ($_SERVER['REQUEST_METHOD'] = "POST" && isset($_POST['login'])){
        //var_dump($_POST);
        $username = $_POST['username'];
        $password = $_POST['password'];
        //Bam mat khau
        // $hashed_pass  = password_hash($password, PASSWORD_BCRYPT);
        //tao prepare state
        $stmt =  $conn->prepare("SELECT * FROM login WHERE user_name = ?");
        $stmt->bindParam(1,$username);
        //Thuc thi
        $stmt->execute();
        //Lay ket qua tra ve
        $back =  $stmt->fetch();
        //var_dump($back);
        $check_pass = $back['pass_word'];
        
        if(password_verify($password,$check_pass) && ($username = $back['user_name']))
        {
            if(isset($_POST['checkbox']))
            {
                //set cookie khi muon remember save
                setcookie('username',$username,time() + 60*60);
                setcookie('password',$password,time() + 60*60);
                var_dump($_COOKIE);
                $_SESSION['login'] = 1;
            }
            //tao session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            // echo "<br/>login succes";
            
            header("location:./dashboard.html");
            
        }else{
            //Co 2 giai phap
            //1. Cho sang 1 trang khac do la failed login
            //2. Co 1 bien toan cuc web nay sang web khac de luu 
            // la thang nay da nhap sai mat khau va dua ra thong bao            

            echo "Sai tên đăng nhập hoặc mật khẩu ";
            echo '<a href="../index.php"> Quay lại trang chủ</a>';
        }

    }
?>