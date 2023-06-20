<?php
$target_dir = "../img/product/".date('Y-m').'/';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_id'];
    $desc = $_POST['desc'];
    if(!is_dir($target_dir)){
      mkdir($target_dir);
    }
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_tmp, $target_dir.$img_name);
    $img = date('Y-m').'/'.$img_name;
    $insert = "insert into pro (id,name,img,price,cat_id,description) values (NULL, '$name', '$img', '$price', '$cat_id', '$desc')";
    $run = mysqli_query($con, $insert);
    if($run){
        echo('<script>location.replace("index.php?pro");</script>');
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ürün Ekleme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Ekleme</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
            <form method="POST" action="index.php?add_pro" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>İsim</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Fotoğraf</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <label>Fiyat</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="cat_id">
                            <?php
                            $get = "select * from cat";
                            $run = mysqli_query($con, $get);
                            while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $name = $row['name']; ?>
                                <option value="<?php echo($id); ?>"><?php echo($name); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea class="form-control" name="desc" rows="5"></textarea> 
                    </div>
                </div>

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Ekle" name="submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

