<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ürünü Silme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürünü Silme</li>
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
                <h3 class="text-center">Silinen Veriler tekrar gelmez, Emin misiniz?</h3>

                <div class="card-footer text-center">
                  <a href="func/del_pro.php?id=<?php echo($_GET['id']); ?>" class="btn btn-warning">Evert, Sil</a>
                  <a href="index.php?pro" class="btn btn-primary">Hayır, Vazgeç</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>