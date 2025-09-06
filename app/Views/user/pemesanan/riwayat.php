<?= $this->extend('user/layout/index') ?>

<?= $this->section('user-section') ?>

<div class="no-bottom no-top zebra" id="content">
  <div id="top"></div>

  <!-- section begin -->
  <section id="subheader" class="jarallax text-light">
    <img src="<?= base_url() ?>/assets/images/background/14.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1>Pemesanan</h1>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- section close -->

  <section id="section-settings" class="bg-gray-100">
    <div class="container">
      <div class="row">

        <?= $this->include('user/layout/alert') ?>

        <div class="col-lg-12">
          <div class="card p-4 rounded-5">
            <div class="row">
              <div class="col-lg-12">
                <div class="de_tab tab_simple">

                  <ul class="de_nav">
                    <li class="active"><span>Riwayat Pemesanan</span></li>
                  </ul>

                  <div class="de_tab_content">
                    <?php if (count($riwayat) <= 0) :  ?>
                      <div class="alert alert-warning" role="alert">
                        Mohon maaf anda belum pernah melakukan pemesanan kendaraan.
                      </div>
                    <?php else : ?>
                      <table class="table table-border">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <td>Armada</td>
                            <td>Tanggal Sewa</td>
                            <td>Tanggal Kembali</td>
                            <td>Biaya</td>
                            <td>Status</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($riwayat as $key) : ?>
                            <tr>
                              <td><?= $i++ ?></td>
                              <td><span class="bold"><?= $key['merk'] . ' ' . $key['model'] ?></span></td>
                              <td><?= date('j M Y H:i', strtotime($key['pickup_date'])) ?></td>
                              <td><?= date('j M Y H:i', strtotime($key['return_date'])) ?></td>
                              <td><?= number_to_currency($key['biaya_sewa'], 'IDR') ?></td>
                              <td>
                                <div class="badge rounded-pill <?=
                                                                $key['status_transaksi'] == 'Diproses' ? 'bg-warning' : '',
                                                                $key['status_transaksi'] == 'Disewa' ? 'bg-info' : '',
                                                                $key['status_transaksi'] == 'Selesai' ? 'bg-success' : '',
                                                                $key['status_transaksi'] == 'Dibatalkan' ? 'bg-danger' : ''
                                                                ?>">
                                  <?= $key['status_transaksi'] ?>
                                </div>
                              </td>
                              <td>
                                <a href="<?= base_url('riwayat-pemesanan/' . $key['id']) ?>" class="btn btn-primary btn-sm">Detail</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>