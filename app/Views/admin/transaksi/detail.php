<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>


<div class="section-header">
  <div class="section-header-back">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
  </div>
  <h1>Detail Transaksi <strong><?= $transaksi['id'] ?></strong></h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
    <div class="breadcrumb-item">Tambah Armada</div>
  </div>
</div>

<div class="section-body">

  <div class="row">
    <div class="col-12">
      <?= $this->include('admin/layout/alert'); ?>
      <div class="card">
        <form method="POST" action="/Admin/Transaksi/update" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="card-body row">
            <input class="form-control" type="hidden" name="id" value="<?= $transaksi['id'] ?>" readonly>
            <div class="form-group col-6 mb-4 ">
              <label>Nama Pemesan</label>
              <input class="form-control" type="text" value="<?= $transaksi['fullname'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Armada</label>
              <input class="form-control" type="text" value="<?= $transaksi['merk'] . ' ' . $transaksi['model'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Email</label>
              <input class="form-control" type="text" value="<?= $transaksi['email'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>No Telp</label>
              <input class="form-control" type="text" value="<?= $transaksi['no_telp'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Tanggal Mulai</label>
              <input class="form-control" type="text" value="<?= date('d/n/Y H:i', strtotime($transaksi['pickup_date'])) ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Tanggal Kembali</label>
              <input class="form-control" type="text" value="<?= date('d/n/Y H:i', strtotime($transaksi['return_date'])) ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Durasi Sewa</label>
              <input class="form-control" type="text" value="<?= $transaksi['duration'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Biaya Sewa</label>
              <input class="form-control" type="text" value="<?= number_to_currency((float)($transaksi['biaya_sewa'] ?? 0), 'IDR') ?>" readonly>
            </div>
            <div class="form-group col-12 mb-4 ">
              <label>Alamat Pemesan</label>
              <textarea readonly name="alamat" id="alamat" style="height:100px;" class="form-control"><?= $transaksi['alamat'] ?></textarea>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Status Penyewaan</label>
              <input class="form-control" type="text" value="<?= $transaksi['status_penyewaan'] ?>" readonly>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Status Transaksi</label>
              <select class="form-control" name="status_transaksi" id="status_transaksi">
                <option>Pilih status transaksi...</option>
                <option value="Diproses" <?= $transaksi['status_transaksi'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                <option value="Disewa" <?= $transaksi['status_transaksi'] == 'Disewa' ? 'selected' : '' ?>>Disewa</option>
                <option value="Selesai" <?= $transaksi['status_transaksi'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                <option value="Dibatalkan" <?= $transaksi['status_transaksi'] == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Catatan Pemesan</label>
              <textarea readonly name="catatan" id="catatan" style="height:100px;" class="form-control"><?= $transaksi['catatan'] ?></textarea>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Catatan Pembatalan</label>
              <textarea readonly name="cancelled_reason" id="cancelled_reason" style="height:100px;" class="form-control"><?= $transaksi['cancelled_reason'] ?></textarea>
            </div>
            <div class="col-4 mb-4 form-group">
              <label>Bukti Pembayaran</label>
              <div>
                <img src="<?= base_url() ?>/img/<?= $transaksi['bukti_pembayaran'] ?>" alt="" style="max-height: 250px">
              </div>
            </div>
            <div class="col-4 mb-4 form-group">
              <label>Foto KTP</label>
              <div>
                <img src="<?= base_url() ?>/img/<?= $transaksi['ktp'] ?>" alt="" style="max-height: 250px">
              </div>
            </div>
            <div class="col-4 mb-4 form-group">
              <label>Foto KK</label>
              <div>
                <img src="<?= base_url() ?>/img/<?= $transaksi['kk'] ?>" alt="" style="max-height: 250px">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>