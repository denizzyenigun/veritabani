<?php
session_start();
include('includes/db.php');
if(isset($_POST['submit'])){
  if($_POST['email'] != '' or $_POST['pass'] != ''){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $get = "select *  from admin where email='$email' and pass='$pass'";
    $run = mysqli_query($con, $get);
    if(mysqli_num_rows($run) != 0){
      $_SESSION['admin'] = $email;
      header('Location: index.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetim Paneli | Giriş Sayfası</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
  <link rel="stylesheet" href="dist/css/custom-style.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Siteye Giriş</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Giriş İçin Admin Bilgilerini Giriniz</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-posta" name="email" />
          <div class="input-group-append">
            <span class="fa fa-envelope input-group-text"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Şifre" name="pass" />
          <div class="input-group-append">
            <span class="fa fa-lock input-group-text"></span>
          </div>
        </div>
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="Giriş" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' 
    })
  })
</script>
</body>
</html>
