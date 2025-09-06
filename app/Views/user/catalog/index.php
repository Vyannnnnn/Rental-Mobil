<?= $this->extend('user/layout/index') ?>

<?= $this->section('user-section') ?>

<div class="no-bottom no-top zebra" id="content">
  <div id="top"></div>

  <!-- section begin -->
  <section id="subheader" class="jarallax text-light">
    <img src="<?= base_url() ?>/assets/images/background/2.jpg" class="jarallax-img" alt="">
    <div class="center-y relative text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1>Armada Kami</h1>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- section close -->

  <section id="section-cars">
    <div class="container">
      <?= $this->include('user/layout/alert') ?>

      <div class="row">
        <div class="col-lg-2">
          <div class="item_filter_group">
            <h4>Tipe Kendaraan</h4>
            <div class="de_form">
              <?php foreach ($type as  $item) : ?>
                <div class="de_checkbox">
                  <input id="type" name="type" type="checkbox" value="<?= $item['type'] ?>">
                  <label for="type"><?= $item['type'] ?></label>
                </div>

                <!-- <div class="de_checkbox">
                  <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox" value="vehicle_type_2">
                  <label for="vehicle_type_2">Van</label>
                </div>

                <div class="de_checkbox">
                  <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox" value="vehicle_type_3">
                  <label for="vehicle_type_3">Minibus</label>
                </div>

                <div class="de_checkbox">
                  <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox" value="vehicle_type_4">
                  <label for="vehicle_type_4">Prestige</label>
                </div> -->
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="col-lg-10">
          <div class="row">

            <?php foreach ($armada as $item) : ?>
              <div class="col-xl-4 col-lg-6">
                <div class="de-item mb30">
                  <div class="d-img">
                    <img src="<?= base_url() ?>/img/<?= $item['image'] ?>" class="img-fluid" alt="" style="height: 200px;">
                  </div>
                  <div class="d-info">
                    <div class="d-text">
                      <h4><?= substr($item['merk'] .  ' ' . $item['model'], 0, 30) ?></h4>
                      <div class="d-atr-group">
                        <span class="d-atr"><img src="<?= base_url() ?>/assets/images/icons/1.svg" alt=""><?= $item['capacity'] ?> Seats</span>
                        <span class="d-atr"><img src="<?= base_url() ?>/assets/images/icons/4.svg" alt=""><?= $item['transmission'] ?></span>
                        <span class="d-atr"><img src="<?= base_url() ?>/assets/images/icons/2.svg" alt=""><?= $item['year'] ?></span>
                      </div>
                      <div class="d-price">
                        Daily rate from <span><?= number_to_currency($item['price'], 'IDR') ?></span>
                        <a class="btn-main" href="<?= base_url('detail-catalog/' . $item['id'])  ?>">Rent Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>