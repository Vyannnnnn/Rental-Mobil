<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Data Rekening</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Rekening</h2>
  <p class="section-lead">Rekening yang digunakan untuk setiap penyewaan mobil.</p>

  <?= $this->include('admin/layout/alert') ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="/Admin/Pembayaran/update">
            <div class="row justify-content-center">
              <div class="col-7">
                <label for="">Nama Pemilik</label>
                <input type="hidden" name="id" id="id" value="<?= $rekening['id'] ?>">
                <input type="text" class="form-control mb-3" name="nama" id="nama" value="<?= $rekening['nama'] ?>">
              </div>
              <div class="col-7">
                <label for="">Bank Rekening</label>
                <input type="text" class="form-control mb-3" name="bank" id="bank" value="<?= $rekening['bank'] ?>">
              </div>
              <div class="col-7">
                <label for="">Nomor Rekening</label>
                <input type="text" class="form-control mb-3" name="no_rek" id="no_rek" value="<?= $rekening['no_rek'] ?>">
              </div>
              <div class="col-7">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>