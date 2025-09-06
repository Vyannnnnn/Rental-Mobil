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
            <h1>Pembatalan Pesanan</h1>
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
                    <li class="active"><span>Alasan Pembatalan</span></li>
                  </ul>

                  <div class="de_tab_content">
                    <form id="form-create-item" class="form-border" method="post" action="/User/Pemesanan/cancelled" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="id" value="<?= $transaksi['id'] ?>" required>
                      <div class="row">
                        <div class="col-12 mb20">
                          <textarea required class="form-control" style="width: 100%; height: 5rem" name="alasan"></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                          <a href="<?= base_url('riwayat-pemesanan/' . $transaksi['id']) ?>" class="btn btn-light mr20">Kembali
                          </a>
                          <button type="submit" class="btn btn-danger">Batalkan
                          </button>
                        </div>
                      </div>
                    </form>
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