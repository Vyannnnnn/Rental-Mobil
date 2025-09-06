<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Tarif Driver</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Tarif Driver</h2>
  <p class="section-lead">Pengelolaan biaya driver per malam.</p>

  <?= $this->include('admin/layout/alert') ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="/Admin/Driver/update" method="POST">
            <div class="row justify-content-center">
              <div class="col-6">
                <h6>Biaya Driver Perhari</h6>
                <input type="hidden" name="id" id="id" class="form-control mb-3" value="<?= $driver['id'] ?>">
                <input type="text" name="biaya" id="biaya" class="form-control mb-3" value="<?= $driver['biaya'] ?>">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>