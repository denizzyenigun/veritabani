<?php
include('includes/db.php');
$name = $email = $phone = $address = $postal = $pass = $confirm = '';
$flag_form = $flag_pass = $flag_user = false;
if(isset($_POST['submit'])){
  if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['address'] == '' || $_POST['postal'] == '' || $_POST['pass'] == '' || $_POST['confirm'] == ''){
    $flag_form = true;
  }else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];
    if($pass != $confirm){
      $flag_pass = true;
    }else{
      $get_user = "select * from user where email='".$email."'";
      $run_user = mysqli_query($con, $get_user);
      $count = mysqli_num_rows($run_user);
      if($count != 0){
        $flag_user = true;
      }else{
        $pass = md5($pass);
        $insert = "insert into user (id,name,email,phone,address,postal,pass) values (NULL, '$name', '$email', '$phone', '$address', '$postal', '$pass')";
        $run_insert = mysqli_query($con, $insert);
        if($run_insert){
          header('Location: login.php');
        }
      }
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
<title>Üye Ol</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
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
        <li><a href="login.php">Kullanıcı Hesabı</a></li>
        <li><a href="register.php">Üye Ol</a></li>
      </ul>
      <div class="row">
        <div class="col-sm-9" id="content">
          <h1 class="title">Yeni Kullanıcı Kayıt Ekranı</h1>
          <?php
            if($flag_form){
              echo('<h1 class="title text-warning">Lütfen istenen bilgileri tamamlayın</h1>');
            }
            if($flag_pass){
              echo('<h1 class="title text-warning">Şifreler Benzemiyor</h1>');
            }
            if($flag_user){
              echo('<h1 class="title text-warning">Siz daha önce kayıt olmuşsunuz</h1>');
            }
          ?>
          <p>Eğer hesabınız varsa <a href="login.php">Giriş Sayfasına</a>Gidiniz.</p>
          <form class="form-horizontal" method="POST">
            <fieldset id="account">
              <legend>Kişisel Bilgileriniz</legend>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">İsim</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="İsim" value="" name="name">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">E-posta Adresiniz</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-posta Adresi" value="" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">Telefon Numaranız</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="Telefon Numaranız" value="" name="phone">
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>Adresiniz</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Adres</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Adres " value="" name="address">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">Posta Kodu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="Posta Kodu" value="" name="postal">
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Şifre</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Şifrenizi Belirleyiniz</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Şifre" value="" name="pass">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Şifreyi Tekrarlayın</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Şifreyi Onaylayın" value="" name="confirm">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Kayıt Ol" name='submit' id='submit'>
              </div>
            </div>
          </form>
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