<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ürünler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürünler</li>
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
              <h3 class="card-title">Ürünler Listesi</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>İsim</th>
                  <th>Fotoğraf</th>
                  <th>Fiyat</th>
                  <th>Kategori</th>
                  <th>Güncelle</th>
                  <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get = "select * from pro";
                $run = mysqli_query($con, $get);
                while($row = mysqli_fetch_array($run)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $img = $row['img'];
                    $price = $row['price'];
                    $cat_id = $row['cat_id'];
                    #
                    $get_cat = "select * from cat where id=$cat_id";
                    $run_cat = mysqli_query($con, $get_cat);
                    $row_cat = mysqli_fetch_array($run_cat);
                    $cat_name = $row_cat['name'];
                ?>
                <tr>
                    <td><a target="_blank" href="../pro.php?id=<?php echo($id); ?>"><?php echo($name); ?></a></td>
                    <td><img class="img-fluid" width="10%" src="../img/product/<?php echo($img); ?>" /></td>
                    <td><?php echo($price); ?></td>
                    <td><?php echo($cat_name); ?></td>
                    <td><a class="btn btn-primary" href="index.php?pro_edit&id=<?php echo($id); ?>">Güncelle</a></td>
                    <td><a class="btn btn-warning" href="index.php?pro_del&id=<?php echo($id); ?>">Sil</a></td>
                </tr>

                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>