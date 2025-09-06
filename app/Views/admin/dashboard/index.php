<?= $this->extend('admin/layout/index'); ?>

<?= $this->section('admin-section'); ?>

<div class="section-header">
  <h1>Dashboard</h1>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Pengguna</h4>
        </div>
        <div class="card-body">
          <?= $user ?> Pengguna
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="far fa-newspaper"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Armada</h4>
        </div>
        <div class="card-body">
          <?= $armada ?> Armada
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Transaksi Selesai</h4>
        </div>
        <div class="card-body">
          <?= $selesai ?> Transaksi
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Pendapatan</h4>
        </div>
        <div class="card-body">
          <?= number_to_currency((float)($pendapatan['pendapatan'] ?? 0), 'IDR') ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Transaksi Sedang Diproses</h4>
        <div class="card-header-action">
          <a href="<?= base_url('proses-transaksi') ?>" class="btn btn-primary">Lihat Semua</a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Biaya Sewa</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($transaksi as $key) :
                ?>
                  <tr>
                    <td class="text-center"><a href="<?= base_url('data-transaksi/' . $key['id']) ?>">
                        <?= $key['id'] ?></a>
                    </td>
                    <td class="text-center">
                      <?= number_to_currency((float)($key['biaya_sewa'] ?? 0), 'IDR') ?>
                    </td>
                    <td class="text-center">
                      <div class="badge <?=
                                        $key['status_transaksi'] == 'Diproses' ? 'badge-warning' : '',
                                        $key['status_transaksi'] == 'Disewa' ? 'badge-info' : '',
                                        $key['status_transaksi'] == 'Selesai' ? 'badge-success' : '',
                                        $key['status_transaksi'] == 'Dibatalkan' ? 'badge-danger' : ''
                                        ?>">
                        <?= $key['status_transaksi'] ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Transaksi Selesai</h4>
        <div class="card-header-action">
          <a href="<?= base_url('success-transaksi') ?>" class="btn btn-primary">Lihat Semua</a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Biaya Sewa</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($transaksi_selesai as $key) :
                ?>
                  <tr>
                    <td class="text-center"><a href="<?= base_url('data-transaksi/' . $key['id']) ?>">
                        <?= $key['id'] ?></a>
                    </td>
                    <td class="text-center">
                      <?= number_to_currency($key['biaya_sewa'], 'IDR') ?>
                    </td>
                    <td class="text-center">
                      <div class="badge <?=
                                        $key['status_transaksi'] == 'Diproses' ? 'badge-warning' : '',
                                        $key['status_transaksi'] == 'Disewa' ? 'badge-info' : '',
                                        $key['status_transaksi'] == 'Selesai' ? 'badge-success' : '',
                                        $key['status_transaksi'] == 'Dibatalkan' ? 'badge-danger' : ''
                                        ?>">
                        <?= $key['status_transaksi'] ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>