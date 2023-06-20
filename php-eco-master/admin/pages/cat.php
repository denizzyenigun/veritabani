<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategoriler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategoriler</li>
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
              <h3 class="card-title">Kategori Listesi</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>İsim</th>
                  <th>Güncelle</th>
                  <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from cat";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $name = $row['name'];
                ?>
                <tr>
                    <td><?php echo($name); ?></td>
                    <td><a class="btn btn-primary" href="index.php?cat_edit&id=<?php echo($id); ?>">Güncelle</a></td>
                    <td><a class="btn btn-warning" href="index.php?cat_del&id=<?php echo($id); ?>">Sil</a></td>
                </tr>

                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>