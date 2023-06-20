<?php
$get_user = "select * from user";
$run_user = mysqli_query($con, $get_user);
$count_user = mysqli_num_rows($run_user);
 
$get = "select * from pro";
$run = mysqli_query($con, $get);
$count_pro = mysqli_num_rows($run);

$get = "select count(id) from uncart group by ip";
$run = mysqli_query($con, $get);
$count_uncart = mysqli_num_rows($run);

$get = "select count(id) from cart where status='0' group by user_email";
$run = mysqli_query($con, $get);
$count_cart_nostatus = mysqli_num_rows($run);

$get = "select count(id) from cart where status='1' and send_status='0' group by user_email";
$run = mysqli_query($con, $get);
$count_cart_unsend = mysqli_num_rows($run);

$get = "select count(id) from cart where status='1' and send_status='1' group by user_email";
$run = mysqli_query($con, $get);
$count_cart_send = mysqli_num_rows($run);

$get = "select * from cart where status='1'";
$run = mysqli_query($con, $get);
$count_sell = 0;
while($row = mysqli_fetch_array($run)){
    $count_sell = $count_sell + $row['count'];
}

$get = "select * from cart where status='1'";
$run = mysqli_query($con, $get);
$total = 0;
while($row = mysqli_fetch_array($run)){
    $pro_id = $row['pro_id'];
    $count = $row['count'];
    $get_pro = "select * from pro where id=$pro_id";
    $run_pro = mysqli_query($con, $get_pro);
    $row_pro = mysqli_fetch_array($run_pro);
    $price = $row_pro['price'];
    $total = $total + ($price * $count);
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Göstergeler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Göstergeler</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo($count_user); ?></h3>

                <p>Toplam Müşteri Sayısı</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo($count_pro); ?></h3>

                <p>Toplam Ürün Sayısı</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($count_uncart) ;?></h3>

                <p>Kayıt olmamış müşterilerin sepet sayısı</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo($count_cart_nostatus); ?></h3>

                <p>Ödenmemiş Sepetlerin Sayısı</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo($count_cart_unsend); ?></h3>

                <p>Gönderilmeyi bekleyen sepetler</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo($count_cart_send); ?></h3>

                <p>Gönderilmiş Sepetler</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($count_sell) ;?></h3>

                <p>Satılmış toplam ürünler</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo($total); ?></h3>

                <p>Toplam Gelir (TL)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>