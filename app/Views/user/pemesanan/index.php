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
                <form id="form-create-item" class="form-border" method="post" action="/User/Pemesanan/booking" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="de_tab tab_simple">

                    <ul class="de_nav">
                      <li class="active"><span>Formulir Pemesanan</span></li>
                    </ul>
                    <input type="hidden" name="carId" id="carId" value="<?= $carId ?>" />
                    <input type="hidden" name="status_penyewaan" id="status_penyewaan" value="<?= $status_penyewaan ?>" />
                    <input type="hidden" name="pickupDatetime" id="pickupDatetime" value="<?= $pickupDatetime ?>" />
                    <input type="hidden" name="returnDatetime" id="returnDatetime" value="<?= $returnDatetime ?>" />
                    <input type="hidden" name="biaya" id="biaya" value="<?= $rentalPrice ?>" />

                    <div class="de_tab_content">
                      <div class="tab-1">
                        <div class="alert alert-warning" role="alert">
                          Pembayaran dapat melalui transfer ke <strong>Bank <?= $payment['bank'] . ' ' . $payment['no_rek'] ?></strong> an <strong><?= $payment['nama'] ?></strong>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 mb20">
                            <h5>Durasi Sewa</h5>
                            <input type="text" name="duration" id="duration" class="form-control" value="<?= $durationDay ?>" readonly />
                          </div>
                          <div class="col-lg-6 mb20">
                            <h5>Biaya Sewa</h5>
                            <input type="text" class="form-control" value="<?= number_to_currency($rentalPrice, 'IDR') ?>" readonly />
                          </div>
                          <div class="col-lg-6 mb20">
                            <h5>Email</h5>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Tulis email anda" value="<?= user()->email ?>" required />
                          </div>
                          <div class="col-lg-6 mb20">
                            <h5>Nama Lengkap</h5>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Tulis nama lengkap" value="<?= user()->fullname ?>" required />
                          </div>
                          <div class="col-lg-6 mb20">
                            <h5>Nomor Telpon</h5>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Tulis nomor telp" required />
                          </div>
                          <div class="col-lg-12 mb20">
                            <h5>Alamat</h5>
                            <textarea name="alamat" id="alamat" style="width: 100%; height: 5rem" placeholder="Tulis alamat anda" required></textarea>
                          </div>
                          <div class="col-lg-4 mb30">
                            <h5>Upload KTP</h5>
                            <input type="file" name="ktp" id="ktp" class="form-control" required />
                          </div>
                          <div class="col-lg-4 mb30">
                            <h5>Upload KK</h5>
                            <input type="file" name="kk" id="kk" class="form-control" required />
                          </div>
                          <div class="col-lg-4 mb30">
                            <h5>Upload Bukti Pembayaran</h5>
                            <input type="file" name="bukti" id="bukti" class="form-control" required />
                          </div>
                          <div class="col-lg-12 mb30">
                            <h5>Catatan</h5>
                            <textarea name="catatan" id="catatan" cols="30" rows="10" placeholder="Tulis catatan untuk admin" style="width: 100%; height: 5rem" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn-main">Pesan Sekarang</button>
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