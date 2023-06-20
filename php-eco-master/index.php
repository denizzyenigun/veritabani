<?php
include('includes/db.php');
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
<meta charset="UTF-8"/>
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="image/favicon.png" rel="icon" />
<title>DenizSpor</title>
<meta name="description" content="Her türlü e-ticaret web mağazası için duyarlı ve temiz html şablon tasarımı">
<!-- CSS Kısmı Başlangıcı -->
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
<!-- CSS Kısmı Sonu -->
</head>
<body>
<div class="wrapper-wide">
  <div id="header">

    <!-- Üst Çubuk Başlangıcı -->
      <?php include('includes/header.php'); ?>
    <!-- Ana Menü Sonu -->
  </div>
  <div id="container">
    <div class="container">
      <div class="row">
        
        <!-- Sol Kısım Başlangıcı -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <?php include('includes/aside.php'); ?>
        </aside>
        <!-- Sol Kısım Sonu -->
        
        <!-- Orta Kısım Başlangıcı -->
        <div id="content" class="col-sm-9">
          <!-- Slayt Başlangıcı -->
          <div class="slideshow single-slider owl-carousel">
            <div class="item"> <a href="#"><img class="img-responsive" src="image/slider/banner-1.jpg" alt="banner 1" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="image/slider/banner-2.jpg" alt="banner 2" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="image/slider/banner-3.jpg" alt="banner 3" /></a> </div>
          </div>
          <!-- Slayt Sonu -->
          <!-- Öne Çıkan Ürünler Başlangıcı -->
          <?php
          $get_cat_i = "select * from cat";
          $run_cat_i = mysqli_query($con, $get_cat_i);
          while($row_cat_i = mysqli_fetch_array($run_cat_i)){
            $cat_name = $row_cat_i['name'];
            $cat_id = $row_cat_i['id'];
            echo('<h3 class="subtitle">'.$cat_name.'</h3>');
            echo('<div class="owl-carousel product_carousel">');
            $get_pro = "select * from pro where cat_id='".$cat_id."' order by rand() limit 10";
            $run_pro = mysqli_query($con, $get_pro);
            while($row_pro = mysqli_fetch_array($run_pro)){
              $id = $row_pro['id'];
              $name = $row_pro['name'];
              $price = $row_pro['price'];
              $image = $row_pro['img'];
               ?>
          
            <div class="product-thumb clearfix">
              <div class="image"><a href="pro.php?id=<?php echo($id); ?>"><img src="img/product/<?php echo($image); ?>" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a></h4>
                <p class="price"><?php echo($price); ?>TL</p>
              </div>
              <div class="button-group">
                <form method="POST" action="func/add_cart.php">
                  <input type="hidden" name='id' value='<?php echo($id); ?>'>
                  <input class="btn-primary" type="submit" name='submit' value="Sepete Ekle" />
                </form>
                <div class="add-to-links">
                  <a href="func/add_compare.php?id=<?php echo($id); ?>"><i class="fa fa-exchange"></i></a>
                </div>
              </div>
            </div>
          
          <?php  } echo('</div>');
          } ?>
          <!-- Öne Çıkan Ürünler Sonu -->
        </div>
        <!-- Orta Kısım Sonu -->
      </div>
    </div>
  </div>
  <!-- Altbilgi Başlangıcı -->
    <?php include('includes/footer.php'); ?>
  <!-- Altbilgi Sonu -->
  
</div>
<!-- JS Kısmı Başlangıcı -->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
