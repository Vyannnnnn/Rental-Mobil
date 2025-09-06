<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Laporan Penyewaan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <?= $this->include('admin/layout/alert') ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="">
            <h6>Filter Transaksi</h6>
            <div class="row">
              <div class="form-group col-2">
                <input type="date" class="form-control" name="start_date">
              </div>
              <div class="form-group col-2">
                <input type="date" class="form-control" name="end_date">
              </div>
              <div class="form-group col-2">
                <button type="submit" class="btn btn-success">Filter</button>
              </div>
            </div>
          </form>

        </div>
      </div>
      <?php if (empty($transaksi)) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>×</span>
            </button>
            Tidak ada transaksi ditemukan
          </div>
        </div>
      <?php else : ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="form-group col">
                <label for="">Total Transaksi</label>
                <input type="text" class="form-control" readonly value="<?= $total_transaksi['success'] ?> Selesai">
              </div>
              <div class="form-group col">
                <label for="">Transaksi Dibatalkan</label>
                <input type="text" class="form-control" readonly value="<?= $total_transaksi_cancel['cancel'] ?> Dibatalkan">
              </div>
              <div class="form-group col">
                <label for="">Total Pendapatan</label>
                <input type="text" class="form-control" readonly value="<?= number_to_currency((float)($total_pendapatan['pendapatan'] ?? 0), 'IDR') ?>">
              </div>
            </div>
            <div class="table-responsive">
              <table id="datatable" class="table table-bordered">
                <thead>
                  <tr>
                    <th width="1rem">No</th>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Kendaraan</th>
                    <th>Status Penyewaan</th>
                    <th>Durasi</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($transaksi as $key) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><a href="<?= base_url('data-transaksi/' . $key['id']) ?>"><?= $key['id'] ?></a></td>
                      <td><?= date('d M Y', strtotime($key['pickup_date'])) ?></td>
                      <td><?= $key['merk'] . ' ' . $key['model'] ?></td>
                      <td><?= $key['status_penyewaan'] ?></td>
                      <td><?= $key['duration'] ?></td>
                      <td><?= number_to_currency((float)($key['biaya_sewa'] ?? 0), 'IDR') ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>