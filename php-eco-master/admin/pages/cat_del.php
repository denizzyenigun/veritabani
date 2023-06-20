<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori Silme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Silme</li>
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
                <h3 class="text-center">Silince bilgiler tekrar gelmez. Emin misiniz?</h3>

                <div class="card-footer text-center">
                  <a href="func/del_cat.php?id=<?php echo($_GET['id']); ?>" class="btn btn-warning">Evet, Sil</a>
                  <a href="index.php?cat" class="btn btn-primary">Hayır, Vazgeç</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>