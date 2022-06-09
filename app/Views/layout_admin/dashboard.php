<?= $this->extend('layout_admin/main'); ?>
<?= $this->section('content'); ?>
<!-- Small Box (Stat card) -->
<div class="container-fluid">

    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>
            <p>Member Baru</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>150</h3>
            <p>Member Habis</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Member Tidak Aktif</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection(); ?>