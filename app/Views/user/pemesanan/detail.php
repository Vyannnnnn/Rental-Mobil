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
            <h1>Detail Transaksi</h1>
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
                <form id="form-create-item" class="form-border">
                  <div class="de_tab tab_simple">
                    <ul class="de_nav">
                      <li class="active"><span>Detail Transaksi <?= $transaksi['id'] ?></span></li>
                    </ul>

                    <div class="de_tab_content">
                      <div class="tab-1">
                        <div class="row">
                          <div class="col-4">
                            <img src="<?= base_url() ?>/img/<?= $transaksi['image'] ?>" alt="<?= $transaksi['merk'] . ' ' . $transaksi['model']  ?>" width="100%">
                          </div>
                          <div class="col-8">
                            <div class="row">
                              <div class="col-lg-6 mb20">
                                <h5>Nama Pemesan</h5>
                                <input type="text" class="form-control" value="<?= $transaksi['fullname'] ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Nomor Telpon</h5>
                                <input type="text" class="form-control" readonly value="<?= $transaksi['no_telp'] ?>" />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Armada</h5>
                                <input type="text" class="form-control" value="<?= $transaksi['merk'] . ' ' . $transaksi['model'] ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Status Penyewaan</h5>
                                <input type="text" class="form-control" value="<?= $transaksi['status_penyewaan'] ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Tanggal Mulai</h5>
                                <input type="text" class="form-control" value="<?= date('j M Y H:i', strtotime($transaksi['pickup_date'])) ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Tanggal Kembali</h5>
                                <input type="text" class="form-control" value="<?= date('j M Y H:i', strtotime($transaksi['return_date'])) ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Durasi Sewa</h5>
                                <input type="text" class="form-control" value="<?= $transaksi['duration'] ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Status Penyewaan</h5>
                                <input type="text" class="form-control" value="<?= number_to_currency($transaksi['biaya_sewa'], 'IDR') ?>" readonly />
                              </div>
                              <div class="col-lg-6 mb20">
                                <h5>Alamat</h5>
                                <textarea style="width: 100%; height: 5rem" readonly>
                                <?= $transaksi['alamat'] ?>
                                </textarea>
                              </div>
                              <div class="col-lg-6 mb30">
                                <h5>Catatan</h5>
                                <textarea style="width: 100%; height: 5rem" readonly>
                                <?= $transaksi['catatan'] ?></textarea>
                              </div>
                              <div class="col-12 d-flex justify-content-end">
                                <a href="<?= base_url('riwayat-pemesanan') ?>" class="btn btn-light mr10">Kembali</a>
                                <?php if ($transaksi['status_transaksi'] === 'Diproses') : ?>
                                  <a href="<?= base_url('pembatalan-pesanan/' . $transaksi['id']) ?>" class="btn btn-danger">Batalkan Pesanan</a>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>