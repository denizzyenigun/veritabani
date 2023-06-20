<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $insert = "insert into cat (id, name) values (NULL, '$name')";
    $run = mysqli_query($con, $insert);
    if($run){
        echo('<script>location.replace("index.php?cat");</script>');
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori Ekleme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Ekleme</li>
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
            <form method="POST" action="index.php?add_cat">
                <div class="card-body">
                    <div class="form-group">
                        <label>İsim</label>
                        <input type="text" class="form-control" name="name">
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


