<?php
$email = $_GET['email'];
$get_user = "select * from user where email='$email'";
$run_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_array($run_user);
$name = $row_user['name'];
$phone = $row_user['phone'];
$address = $row_user['address'];
$postal = $row_user['postal'];

?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sipariş Detayları</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Sipariş Detayları</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Müşteri Detayları</h3>
            </div>
            <div class="card-body">
                <h5>İsim :‌</h5>
                <p><?php echo($name); ?></p>

                <h5>E-posta :‌</h5>
                <p><?php echo($email); ?></p>

                <h5>Telefon :‌</h5>
                <p><?php echo($phone); ?></p>

                <h5>Adres :‌</h5>
                <p><?php echo($address); ?></p>

                <h5>Posta Kodu :‌</h5>
                <p><?php echo($postal); ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sipariş Detayları</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>İsim</th>
                  <th>Miktar</th>
                  <th>Birim Fiyatı</th>
                  <th>Toplam ürün fiyatı</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cart where user_email='$email' and status='1' and send_status='0'";
                $run = mysqli_query($con, $get);
                $total1 = 0;
                while($row = mysqli_fetch_array($run)){
                    $pro_id = $row['pro_id'];
                    $count = $row['count'];
                    #
                    $get_pro = "select * from pro where id=$pro_id";
                    $run_pro = mysqli_query($con, $get_pro);
                    $row_pro = mysqli_fetch_array($run_pro);
                    $name = $row_pro['name'];
                    $price = $row_pro['price'];
                    $total1 = $total1 + ($price * $count);
                ?>
                <tr>
                    <td><a target="_blank" href="../pro.php?id=<?php echo($pro_id); ?>"><?php echo($name); ?></a></td>
                    <td><?php echo($count); ?></td>
                    <td><?php echo($price); ?></td>
                    <td><?php echo($count * $price); ?></td>
                </tr>

                <?php } ?>
              </table>
              
            </div>

          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
            <h4 class="card-title">Müşterinin toplam harcaması <?php echo($total1); ?></h4><br />
            <a class="btn btn-primary btn-block" href="func/change.php?email=<?php echo($email); ?>">Sepet Durumunu Güncelle</a><br>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>