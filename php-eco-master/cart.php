<?php
include('includes/db.php');

?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>Sepetiniz</title>
<meta name="description" content="Her türlü e-ticaret web mağazası için duyarlı ve temiz html şablon tasarımı">
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
        <li><a href="cart.php">Sepetiniz</a></li>
      </ul>
      <div class="row">
        <div id="content" class="col-sm-12">
          <h1 class="title">Sepetiniz</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">Ürün Resmi</td>
                    <td class="text-left">Ürün Adı</td>
                    <td class="text-left">Adet</td>
                    <td class="text-right">Ürün Fiyatı</td>
                    <td class="text-right">Toplam Fiyat</td>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                    if(isset($_SESSION['email'])){
                      $email = $_SESSION['email'];
                      $get_cart = "select * from cart where user_email='$email' and status='0'";
                      $run_cart = mysqli_query($con, $get_cart);
                    }else{
                      $ip = getUserIP();
                      $get_cart = "select * from uncart where ip='$ip'";
                      $run_cart = mysqli_query($con ,$get_cart);
                    }
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
              </table>
            </div>
          <h2 class="subtitle">Nasıl Devam Etmek İstersiniz?</h2>

          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>Toplam Ücret:</strong></td>
                  <td class="text-right"><?php echo($total); ?> TL</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.php" class="btn btn-default">Alışverişe Geri Dön</a></div>
            <div class="pull-right"><a href="checkout.php" class="btn btn-primary">Ödeme Aşaması</a></div>
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
