<?php
include('includes/db.php');
include('func/add_uncart_cart.php');
$email = $pass = '';
$flag = false;
if(isset($_POST['submit'])){
  if($_POST['email'] == '' || $_POST['pass'] == ''){
    $flag = true;
  }else{
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $pass = md5($pass);
    $get_user = "select * from user where email='$email' and pass='$pass'";
    $run_user = mysqli_query($con ,$get_user);
    $count = mysqli_num_rows($run_user);
    if($count != 0){
      $_SESSION['email'] = $email;
      add_uncart_cart();
      header('Location: profile.php');
    }
  }
}
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Giriş</title>
<meta name="description" content="Her türlü e-ticaret web mağazası için duyarlı ve temiz HTML şablonu tasarımı">
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-rtl.css" />
<link rel="stylesheet" type="text/css" href="css/responsive-rtl.css" />
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
</head>
<body>
<div class="wrapper-wide">
  <div id="header">
    <?php include('includes/header.php'); ?>
  </div>
  <div id="container">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="login.php">Üye Ol</a></li>
        <li><a href="login.php">Giriş Yap</a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-9">
          <h1 class="title">Üye Hesabına Giriş</h1>
          <div class="row">
            <div class="col-sm-6">
              <h2 class="subtitle">Yeni Üye</h2>
              <p><strong>Üye Ol</strong></p>
              <p>Üye olarak, kampanyalardan yararlanabilir ve alışverişlerinizi daha rahat yapabilirsiniz!</p>
              <a href="register.php" class="btn btn-primary">Devam Et</a> </div>
            <div class="col-sm-6">
              <h2 class="subtitle">Üye Girişi</h2>
              <form method="POST">
              <p><strong>Kullanıcı hesabım var.</strong></p>
                <div class="form-group">
                  <label class="control-label" for="input-email">E-posta Adresi</label>
                  <input type="text" name="email" value="" placeholder="E-posta Adresi" id="input-email" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="control-label" for="input-password">Şifre</label>
                  <input type="password" name="pass" value="" placeholder="Şifre" id="input-password" class="form-control" />
                  <br />
                <input type="submit" value="Giriş Yap" class="btn btn-primary" name='submit'/></form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('includes/footer.php'); ?>
</div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
