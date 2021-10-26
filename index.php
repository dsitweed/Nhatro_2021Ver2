<?php
  require_once "./main/config.php";
  require_once "./main/session.php";

  $user = "root";
  $stmt= $conn->prepare("SELECT `so_phong_trong` FROM `login` WHERE `user_name` = ?;");
  $stmt->bindParam(1,$user);
  
  $stmt->execute();
  $out = $stmt->fetch();
  $limit = $out['so_phong_trong'];

  $stmt = $conn->prepare("SELECT * FROM images LIMIT $limit;");
  $stmt->execute();

  // Phan dang nhap
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="./assets/img/icon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Home page</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
    name="viewport" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/ed79b0eca0.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="./assets/css/styles.css" />
  <link rel="stylesheet" href="./assets/css/hompage.css" />
  <link rel="stylesheet" href="./assets/css/show_detail.css" />
  <!-- <link href="../assets/css/demo.css" rel="stylesheet" /> -->
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="black" data-image="./assets/img/sidebar-5.jpg">
      <div class="sidebar-wrapper">
        <div class="logo">
          <span style="font-size: 25px">Nhà trọ Long Mừng</span>
        </div>
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <i class="fas fa-home"></i>
              <p>Trang chủ</p>
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
              <i class="nc-icon nc-circle-09"></i>
              <p>Thông tin</p>
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
              <i class="nc-icon nc-notes"></i>
              <p>Số liệu</p>
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
              <i class="nc-icon nc-pin-3"></i>
              <p>Bản đồ</p>
            </a>
          </li>
          <li>
            <a class="nav-link" href="#">
              <i class="nc-icon nc-bell-55"></i>
              <p>Thông báo</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg" color-on-scroll="500">
        <div class="container-fluid">
          <a class="navbar-brand" href="#pablo">
            <img src="./assets/img/icon.png" style="height: 55px" />
          </a>
          <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
              <li class="dropdown nav-item" style="margin-left: 10px">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="nc-icon nc-planet"></i>
                  <span class="notification">5</span>
                  <span class="d-lg-none">Notification</span>
                </a>
                <ul class="dropdown-menu">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                  <a class="dropdown-item" href="#">Another notification</a>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <span class="nav-link" onclick="openForm()">Đăng nhập</span>
              </li>
              <li class="nav-item">
                <span class="nav-link">Đăng ký</span>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="form-group form-popup" id="myForm">
              <form action="./main/login.php" class="form-container" method="post">
                <h1>Đăng nhập</h1>
                <div class="form-group">
                  <input type="text" class="form-control" name="username" required placeholder="Tên đăng nhập" value="root" />
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" required placeholder="Mật khẩu" value="123"/>
                </div>
                <div class="check-box">
                  <label><input type="checkbox" name="checkbox"  value="1"/>Ghi nhớ</label>
                </div>
                <button type="submit" class="btn btn-primary btn-form" name="login"> Đăng nhập</button>
                <button type="button" class="btn btn-danger btn-form" onclick="closeForm()">Đóng</button>
              </form>
            </div>
            <!-- Chuc nang dang nhap -->
            <!-- Chuc nang hien thi ra man hinh -->
            
            <!--Show detail-->
            <?php
                while ($result = $stmt->fetch()){
                  
                  echo '
                  <div class="row show-detail">
                    <div class="left col-md-6">
                      <img class="myImg" src="'.$result['image'].'" onclick="openModal(\''.$result['image'].'\')" width="2000" height="300">
                    </div>
                    <div class="col-md-6">
                      <div class="card-header">
                        <h3 class="text-primary">Phòng '.$result['so_phong'].'</h3>
                      </div>
                      <div class="card-body">
                        <p style="font-size: 18px;"><strong>Giá tiền: '.$result['gia_phong'].'</strong></p>
                        <p>Miêu tả:</p>
                        <p class="description">'.$result['alt'].'</p>
                      </div>
                    </div>
                  </div>';
                }
            ?>
            <!--End show detail -->
            <!-- The modal  lam mo man hinh-->
            <div class="modal" id="myModal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div><!--end modal lam mo man hinh -->
          </div><!--end row class -->
        </div><!-- end container-fluid-->
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul class="footer-menu">
              <li>
                <a href="#"> Home </a>
              </li>
              <li>
                <a href="#"> Company </a>
              </li>
              <li>
                <a href="#"> Portfolio </a>
              </li>
              <li>
                <a href="#"> Blog </a>
              </li>
            </ul>
            <p class="copyright text-center">
              <i class="far fa-copyright"></i>
              2021. Coded by Nguyễn Văn Kỳ
              <a href="https://github.com/dsitweed" target="_blank"><i class="fab fa-github fa-lg"
                  style="color: black"></i></a>
            </p>
          </nav>
        </div>
      </footer>
    </div>
  </div>
</body>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUN7MHkMlDWmEAJnHQ_ZxBqaBvGFKbOBg&callback=initMap"></script>
<!--  Chartist Plugin  -->
<script src="./assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<!-- <script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script> -->

<script>
  //Open form and close form
  function openForm(){
    let login = document.getElementById("login");
    let modal = document.getElementById("myModal");
    modal.style.display = "block";
    let form = document.getElementById("myForm");
    form.style.display = "block";
  }

  function closeForm() {
    let modal = document.getElementById("myModal");
    let form =document.getElementById("myForm");
    if (modal.style.display === "block"){
      modal.style.display = "none";
    }
    form.style.display = "none";
  }
</script>

<script>

  function openModal(s){
    //get modal
    var modal = document.getElementById("myModal");
    //get the image and insert it inside the modal
    var modalImg = document.getElementById("img01");
    //Open model
    modal.style.display = "block";
    modalImg.src = s;
    console.log(s);
  }

  //Get the span
  var span = document.getElementsByClassName("close")[0];
  //when the user click on <span> (x), close the modal
  span.onclick = function(){
    var modal = document.getElementById("myModal");
    var form = document.getElementById("myForm");
    var modalImg = document.getElementById("img01");
    modal.style.display = "none";
    if (form.style.display === "block")
    form.style.display = "none";
    modalImg.src = "";
  }    

</script>

</html>