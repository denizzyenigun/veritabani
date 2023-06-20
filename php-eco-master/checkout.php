<?php
if(!isset($_SESSION['email'])){
  header('Location: register.php');
}
include('includes/db.php');
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Ödemeyi Yap</title>
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
        <li><a href="cart.php">Alışveriş Sepeti</a></li>
        <li><a href="checkout.php">Ödemeyi Yap</a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-12">
          <h1 class="title">Ödemeyi Yap</h1>
          <div class="row">
            <div class="col-sm-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-user"></i> Kişisel Bilgileriniz</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="account">
                          <div class="form-group required">
                            <label for="input-payment-firstname" class="control-label">İsim</label>
                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="İsim" value="" name="firstname">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-lastname" class="control-label">Soyismi</label>
                            <input type="text" class="form-control" id="input-payment-lastname" placeholder="Soyismi" value="" name="lastname">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-email" class="control-label">E-posta Adresi</label>
                            <input type="text" class="form-control" id="input-payment-email" placeholder="E-posta Adresi" value="" name="email">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-telephone" class="control-label">Telefon Numarası</label>
                            <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telefon Numarası" value="" name="telephone">
                          </div>
                          <div class="form-group">
                            <label for="input-payment-fax" class="control-label">Fax</label>
                            <input type="text" class="form-control" id="input-payment-fax" placeholder="Fax" value="" name="fax">
                          </div>
                        </fieldset>
                      </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-book"></i> Adres</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="address" class="required">
                          <div class="form-group">
                            <label for="input-payment-company" class="control-label">Firma</label>
                            <input type="text" class="form-control" id="input-payment-company" placeholder="Firma" value="" name="company">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-address-1" class="control-label">Adres 1</label>
                            <input type="text" class="form-control" id="input-payment-address-1" placeholder="Adres 1" value="" name="address_1">
                          </div>
                          <div class="form-group">
                            <label for="input-payment-address-2" class="control-label">Adres 2</label>
                            <input type="text" class="form-control" id="input-payment-address-2" placeholder="Adres 2" value="" name="address_2">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-city" class="control-label">Şehir</label>
                            <input type="text" class="form-control" id="input-payment-city" placeholder="Şehir" value="" name="city">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-postcode" class="control-label">Posta Kodu</label>
                            <input type="text" class="form-control" id="input-payment-postcode" placeholder="Posta Kodu" value="" name="postcode">
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" checked="checked" value="1" name="shipping_address">
                              Fatura Adresi ile Teslimat Adresi Aynı.</label>
                          </div>
                        </fieldset>
                      </div>
              </div>
            </div>
            <div class="col-sm-8">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Alışveriş Sepeti</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td class="text-center">Fotoğraf</td>
                                <td class="text-left">Ürün Adı</td>
                                <td class="text-left">Miktar</td>
                                <td class="text-right">Birim Fiyatı</td>
                                <td class="text-right">Toplam</td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                            $email = $_SESSION['email'];
                            $get_cart = "select * from cart where user_email='$email' and status='0'";
                            $run_cart = mysqli_query($con, $get_cart);
                            $total = 0;
                            while($row_cart = mysqli_fetch_array($run_cart)){
                              $id = $row_cart['pro_id'];
                              $count = $row_cart['count'];
                              #
                              $get_pro_d = "select * from pro where id=$id";
                              $run_pro_d = mysqli_query($con, $get_pro_d);
                              $row_pro_d = mysqli_fetch_array($run_pro_d);
                              $name = $row_pro_d['name'];
                              $img = $row_pro_d['img'];
                              $price = $row_pro_d['price'];
                              $total = $total + ($price * $count);
                              ?>
                              <tr>
                                <td colspan="0.5" class="text-center"><a href="pro.php?id=<?php echo($id); ?>"><img src="img/product/<?php echo($img); ?>" width="20%" class="img-thumbnail" /></a></td>
                                <td colspan="1" class="text-left"><a href="pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a><br />
                                <td colspan="1" class="text-left"><div class="input-group btn-block quantity">
                                    <input type="text" name="count" value="<?php echo($count); ?>" size="1" class="form-control" />
                                    <span class="input-group-btn">
                                    <form method="POST" action="func/del_cart.php"><input type="hidden" name='id' value="<?php echo($pro_id_mini); ?>" /><input type="submit" name='submit' class="btn btn-danger btn-xs remove" value='Sil' />
                                    </span></div></td>
                                <td colspan="1" class="text-right"><?php echo($price); ?> TL</td>
                                <td colspan="1" class="text-right"><?php echo($price * $count); ?> TL</td>
                              </tr>
                            <?php }
                            ?>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>Toplam:</strong></td>
                                <td class="text-right"><?php echo($total); ?> TL</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                        <br>
                        <label class="control-label" for="confirm_agree">
                        <div class="buttons">
                          <div class="pull-right">
                            <a href="func/confirm_cart.php" class="btn btn-primary">Siparişi Onayla</a>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
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