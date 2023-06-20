<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Siparişler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Siparişler</li>
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
              <h3 class="card-title">Siparişler Listesi</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>İsim</th>
                  <th>E-posta</th>
                  <th>Tarih</th>
                  <th>Gönderi Durumu</th>
                  <th>Kontorl et</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cart where status='1' group by user_email order by send_status";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $email = $row['user_email'];
                    $date = $row['date'];
                    $send_status = $row['send_status'];
                    #
                    $get_user = "select * from user where email='$email'";
                    $run_user = mysqli_query($con, $get_user);
                    $row_user = mysqli_fetch_array($run_user);
                    $name = $row_user['name'];
                ?>
                <tr>
                    <td><?php echo($name); ?></td>
                    <td><?php echo($email); ?></td>
                    <td><?php echo($date); ?></td>
                    <td><?php if($send_status == '0'){echo('Gönderilmeyi Bekliyor');}else{echo('Gönderildi');} ?></td>
                    <td><a class="btn btn-primary" href="index.php?show&email=<?php echo($email); ?>">Kontrol Et</a></td>
                </tr>

                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>