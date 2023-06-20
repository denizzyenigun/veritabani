<?php
include('includes/db.php');
if(!isset($_SESSION['email'])){
    header('Location: index.php');
}
$email = $_SESSION['email'];
$get_u = "select * from user where email='$email'";
$run_u = mysqli_query($con, $get_u);
$row_u = mysqli_fetch_array($run_u);
$name_u = $row_u['name'];
$pass = $row_u['pass'];
$address = $row_u['address'];
$postal = $row_u['postal'];
$phone = $row_u['phone'];
$flag_form = $flag_pass = $flag_user = false;
if(isset($_POST['submit'])){
  if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['address'] == '' || $_POST['postal'] == ''){
    $flag_form = true;
  }else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $old_pass = $_POST['old_pass'];
    if($old_pass == ''){
      $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal' where email='$email'";
      $run_update = mysqli_query($con ,$update);
      if($run_update){
        $flag_user = true;
      }
    }else{
      if(md5($old_pass) == $pass){
        $new_pass = $_POST['pass'];
        $confirm = $_POST['confirm'];
        if($new_pass == $confirm){
          $new_pass = md5($new_pass);
          $update = "update user set name='$name', email='$email', phone='$phone', address='$address', postal='$postal', pass='$new_pass' where email='$email'";
          $run_update = mysqli_query($con ,$update);
          if($run_update){
            $flag_user = true;
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="UTF-8"/>
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>DenizSpor</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
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
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">

    <!-- Top Bar Start-->
      <?php include('includes/header.php'); ?>
  </div>
  <div id="container">

    <div class="container">
      <div class="row">
        
        <!-- Left Part Start-->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <?php include('includes/aside.php'); ?>
        </aside>
        <!-- Left Part End-->
        
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">Bilgilerinizi Güncelleyin</h1>
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
          <form class="form-horizontal" method="POST">
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">İsim</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-firstname" placeholder="İsim" value="<?php echo($name_u); ?>" name="name">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">E-posta Adresi</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="input-email" placeholder="E-posta Adresi" value="<?php echo($email); ?>" name="email">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">Telefon Numarası</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="Telefon Numarası" value="<?php echo($phone); ?>" name="phone">
                </div>
              </div>
            </fieldset>
            <fieldset id="address">
              <legend>Adres</legend>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">Adres</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="Adres " value="<?php echo($address); ?>" name="address">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">Posta Kodu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="Posta Kodu" value="<?php echo($postal); ?>" name="postal">
                </div>
              </div>
            </fieldset>
            <fieldset>
            <h2 class="title text-warning">Eğer Şifreyi Değiştirmek istemiyorsanız alttaki kısımları boş bırakın.</h2>
              <legend>Şifreniz</legend>
              
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Eski Şifreniz</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Eski Şifreniz" value="" name="old_pass">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">Yeni Şifreniz</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-password" placeholder="Yeni Şifreniz" value="" name="pass">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">Şifrenizi Onaylayın</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="input-confirm" placeholder="Şifrenizi Onaylayın" value="" name="confirm">
                </div>
              </div>
            </fieldset>
            <div class="buttons">
              <div class="pull-right">
                <input type="submit" class="btn btn-primary" value="Güncelle" name='submit' id='submit'>
              </div>
            </div>
          </form>
          <div class="col-sm-9" id="content">
          <h1 class="title">Siparişleriniz</h1>
          <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <td><strong>İsim</strong></td>
                  <td><strong>Fotoğraf</strong></td>
                  <td><strong>Miktar</strong></td>
                  <td><strong>Fiyat</strong></td>
                  <td><strong>Sipariş Tarihi</strong></td>
                  <td><strong>Gönderi Durumu</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                $get_cart = "select * from cart where user_email='$email' order by send_status";
                $run_cart = mysqli_query($con, $get_cart);
                while($row_cart = mysqli_fetch_array($run_cart)){
                  $pro_id = $row_cart['pro_id'];
                  $count = $row_cart['count'];
                  $date = $row_cart['date'];
                  $status = $row_cart['send_status'];
                  #
                  $get_pro = "select * from pro where id=$pro_id";
                  $run_pro = mysqli_query($con, $get_pro);
                  $row_pro = mysqli_fetch_array($run_pro);
                  $name = $row_pro['name'];
                  $img = $row_pro['img'];
                  $price = $row_pro['price']; ?>

                  <tr>
                    <td><a href="pro.php?id=<?php echo($pro_id); ?>"><?php echo($name); ?></a></td>
                    <td><div class="image"><img width="50%" class="img-responsive" src="img/product/<?php echo($img); ?>" /></div></td>
                    <td><?php echo($count); ?></td>
                    <td><?php echo($count * $price); ?></td>
                    <td><?php echo($date); ?></td>
                    <td>
                      <?php 
                        if($status == '0'){
                          echo('Gönderilmedi');
                        }else{
                          echo('Gönderildi');
                        }
                      ?>
                    </td>
                  </tr>

                <?php } ?>
                
              </tbody>
            </table>
        </div>
        </div>
        
        <!--Middle Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->
    <?php include('includes/footer.php'); ?>
  <!--Footer End-->
  
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->
</body>
</html>