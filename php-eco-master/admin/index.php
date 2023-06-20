<?php
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login.php');
}
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetim Paneli</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Çıkış</i></a>
      </li>
    </ul>
  </nav> 

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Yönetim Ekranı</span>
    </a>

    <div class="sidebar" style="direction: rtl">
      <div style="direction: ltr">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">Deniz Yenigün</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../index.php" target="_blank" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Siteyi Ziyaret Et</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?dash" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Gösterge Ekranı</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?add_cat" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Kategori Ekleme</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?cat" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Kategori</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?add_pro" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Ürün Ekle</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?pro" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Ürünler</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?cart" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Siparişler</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?user" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>Müşteriler</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </aside>

    <?php
      if(isset($_GET['dash'])){
        include('pages/dash.php');
      }
      elseif(isset($_GET['user'])){
        include('pages/user.php');
      }
      elseif(isset($_GET['user_edit'])){
        include('pages/user_edit.php');
      }
      elseif(isset($_GET['user_del'])){
        include('pages/user_del.php');
      }
      elseif(isset($_GET['add_pro'])){
        include('pages/add_pro.php');
      }
      elseif(isset($_GET['pro'])){
        include('pages/pro.php');
      }
      elseif(isset($_GET['pro_edit'])){
        include('pages/pro_edit.php');
      }
      elseif(isset($_GET['pro_del'])){
        include('pages/pro_del.php');
      }
      elseif(isset($_GET['add_cat'])){
        include('pages/add_cat.php');
      }
      elseif(isset($_GET['cat'])){
        include('pages/cat.php');
      }
      elseif(isset($_GET['cat_edit'])){
        include('pages/cat_edit.php');
      }
      elseif(isset($_GET['cat_del'])){
        include('pages/cat_del.php');
      }
      elseif(isset($_GET['cart'])){
        include('pages/cart.php');
      }
      elseif(isset($_GET['show'])){
        include('pages/show.php');
      }
      else{
        include('pages/dash.php');
      }
    ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
