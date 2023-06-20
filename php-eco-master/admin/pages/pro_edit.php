<?php
$target_dir = "../img/product/".date('Y-m').'/';
$id = $_GET['id'];
$get = "select * from pro where id=$id";
$run = mysqli_query($con, $get);
$row = mysqli_fetch_array($run);
$name = $row['name'];
$img = $row['img'];
$price = $row['price'];
$cat_id = $row['cat_id'];
$desc = $row['description'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_id'];
    $desc = $_POST['desc'];

    if($_FILES['img']['name'] == ''){
          $insert = "update pro set name='$name', price='$price', cat_id='$cat_id', description='$desc', where id=$id";
          $run = mysqli_query($con, $insert);
          if($run){
              echo('<script>location.replace("index.php?pro");</script>');
          }
    }else{
        if(!is_dir($target_dir)){
            mkdir($target_dir);
          }
          $img_name = $_FILES['img']['name'];
          $img_tmp = $_FILES['img']['tmp_name'];
          move_uploaded_file($img_tmp, $target_dir.$img_name);
          $img = date('Y-m').'/'.$img_name;
          #
          $insert = "update pro set name='$name', img='$img', price='$price', cat_id='$cat_id', description='$desc', where id=$id";
          $run = mysqli_query($con, $insert);
          if($run){
              echo('<script>location.replace("index.php?pro");</script>');
          }
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ürünleri Güncelleme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürünleri Güncelleme</li>
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
            <form method="POST" action="index.php?pro_edit&id=<?php echo($id); ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>İsim</label>
                        <input type="text" class="form-control" name="name" value="<?php echo($name); ?>">
                    </div>
                    <h3 class="text-warning bg-dark">Eğer Fotoğrafı değiştirmek istemiyorsanız, boş bırakın</h3>
                    <div class="form-group">
                        <label>Fotoğraf</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <label>Fiyat</label>
                        <input type="text" class="form-control" name="price" value="<?php echo($price); ?>">
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
                        <textarea class="form-control" name="desc" rows="5"><?php echo($desc); ?></textarea> 
                    </div>
                </div>

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Güncelle" name="submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>