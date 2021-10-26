<?php
    require_once "./config.php";
    require_once "./session.php";
  
    $stmt = $conn->prepare("SELECT * FROM images");
    $stmt->execute();
?>

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../assets/img/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Home page</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/ed79b0eca0.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

  <!-- Table style /> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/table.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
      var actions = $("table td:last-child").html();
      // Append table with add row form on add new button click
      $(".add-new").click(function () {
        $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
          '<td><input type="text" class="form-control" name="name" id="name"></td>' +
          '<td><input type="text" class="form-control" name="department" id="department"></td>' +
          '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
          '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
          '<td>' + actions + '</td>' +
          '</tr>';
        $("table").append(row);
        $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
      });
      // Add row on add button click
      $(document).on("click", ".add", function () {
        var empty = false;
        var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function () {
          if (!$(this).val()) {
            $(this).addClass("error");
            empty = true;
          } else {
            $(this).removeClass("error");
          }
        });
        $(this).parents("tr").find(".error").first().focus();
        if (!empty) {
          input.each(function () {
            $(this).parent("td").html($(this).val());
          });
          $(this).parents("tr").find(".add, .edit").toggle();
          $(".add-new").removeAttr("disabled");
        }
      });
      // Edit row on edit button click
      $(document).on("click", ".edit", function () {
        $(this).parents("tr").find("td:not(:last-child)").each(function () {
          $(this).html('<input type="text" class="form-control" value="' + $(this)
            .text() + '">');
        });
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new").attr("disabled", "disabled");
      });
      // Delete row on delete button click
      $(document).on("click", ".delete", function () {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
      });
    });
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="black" data-image="../assets/img/sidebar-5.jpg">
      <div class="sidebar-wrapper">
        <div class="logo">
          <span style="font-size: 25px">Nhà trọ Long Mừng</span>
        </div>
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">
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
          <a class="navbar-brand" href="./dashboard.html" style="font-size: 30px;">
            <i class="fas fa-arrow-left"></i>
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
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="container">
              <div class="table-wrapper">
                <div class="table-title">
                  <div class="row">
                    <div class="col-sm-8">
                      <h2>Thông tin tất cả <b>phòng trọ</b></h2>
                    </div>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-info add-new" style="font-size: 15px;">
                        <i class="fa fa-plus"></i> Thêm mới
                      </button>
                    </div>
                  </div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Phòng số</th>
                      <th>Giá tiền</th>
                      <th>Ảnh</th>
                      <th>Miêu tả</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>Phòng 301</td>
                      <td>Administration</td>
                      <td><img src="../assets/img/database/a30a1f2028a5e1fbb8b42.jpg" class="img-thumbnail"
                          width="100px" height="100px"></td>
                      <td>Phòng đẹp</td>
                      <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i
                            class="material-icons">&#xE872;</i></a>
                      </td>
                    </tr> -->
                    <?php
                        while ($result = $stmt->fetch())
                        {
                            echo '
                            <tr>
                                <td>Phòng '.$result['so_phong'].'</td>
                                <td>'.$result['gia_phong'].'</td>
                                <td><img src=".'.$result['image'].'" class="img-thumbnail" width="100px" height="100px"></td>
                                <td>'.$result['alt'].'</td>
                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h3 class="text-center">Hiện tại chỉ có chức năng hiển thị chưa cập nhật chức năng chỉnh sửa trực quan
                </h3>
              </div>
            </div>
          </div>
        </div>
      <div>
    <div>
</body>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->

</html>