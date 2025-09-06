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
            <h1>Detail Armada</h1>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- section close -->



  <section id="section-car-details">
    <div class="container">
      <?= $this->include('user/layout/alert') ?>
      <div class="row g-5">
        <div class="col-lg-8">
          <div id="slider-carousel" class="owl-carousel">
            <div class="item">
              <img src="<?= base_url() ?>/img/<?= $item['image'] ?>" alt="">
            </div>
            <!-- <div class="item">
              <img src="<?= base_url() ?>/assets/images/car-single/2.jpg" alt="">
            </div>
            <div class="item">
              <img src="<?= base_url() ?>/assets/images/car-single/3.jpg" alt="">
            </div>
            <div class="item">
              <img src="<?= base_url() ?>/assets/images/car-single/4.jpg" alt="">
            </div> -->
          </div>

          <div class="">
            <h3><?= $item['merk'] ?> <?= $item['model'] ?> <?= $item['year'] ?></h3>
            <p><?= $item['desc'] ?></p>

            <div class="spacer-10"></div>

            <h4>Specifications</h4>
            <div class="de-spec">
              <div class="d-row">
                <span class="d-title">Type</span>
                <spam class="d-value"><?= $item['type'] ?></spam>
              </div>
              <div class="d-row">
                <span class="d-title">Seat</span>
                <spam class="d-value"><?= $item['capacity'] ?> seats</spam>
              </div>
              <!-- <div class="d-row">
                <span class="d-title">Door</span>
                <spam class="d-value">2 doors</spam>
              </div> -->
              <!-- <div class="d-row">
                <span class="d-title">Luggage</span>
                <spam class="d-value">150</spam>
              </div> -->
              <div class="d-row">
                <span class="d-title">Fuel Type</span>
                <spam class="d-value"><?= $item['fuel'] ?></spam>
              </div>
              <!-- <div class="d-row">
                <span class="d-title">Engine</span>
                <spam class="d-value">3000</spam>
              </div> -->
              <div class="d-row">
                <span class="d-title">Year</span>
                <spam class="d-value"><?= $item['year'] ?></spam>
              </div>
              <!-- <div class="d-row">
                <span class="d-title">Mileage</span>
                <spam class="d-value">200</spam>
              </div> -->
              <div class="d-row">
                <span class="d-title">Transmission</span>
                <spam class="d-value"><?= $item['transmission'] ?></spam>
              </div>
              <!-- <div class="d-row">
                <span class="d-title">Drive</span>
                <spam class="d-value">4WD</spam>
              </div> -->
              <!-- <div class="d-row">
                <span class="d-title">Fuel Economy</span>
                <spam class="d-value">18.5</spam>
              </div> -->
              <!-- <div class="d-row">
                <span class="d-title">Exterior Color</span>
                <spam class="d-value">Blue Metalic</spam>
              </div> -->
              <div class="d-row">
                <span class="d-title">Color</span>
                <spam class="d-value"><?= $item['color'] ?></spam>
              </div>
            </div>

            <div class="spacer-single"></div>

            <h4>Features</h4>
            <ul class="ul-style-2">
              <li>Bluetooth</li>
              <li>Multimedia Player</li>
              <li>Central Lock</li>
              <li>Sunroof</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="de-price text-center">
            Daily rate
            <h4><?= number_to_currency($item['price'], 'IDR') ?></h4>
          </div>
          <div class="spacer-30"></div>
          <div class="de-box mb25">
            <form method="post" enctype="multipart/form-data" action="/User/Pemesanan/index">
              <h4>Booking this car</h4>

              <div class="spacer-20"></div>

              <input type="hidden" name="id" value="<?= $item['id'] ?>">

              <div class="row">

                <div class="col-lg-12 mb20">
                  <h5>Pick Up Date & Time</h5>
                  <div class="date-time-field">
                    <input type="text" id="date-picker" name="pickupDate" required>
                    <select name="pickupTime" id="pickup-time" required>
                      <option value="00:00" selected>00:00</option>
                      <option value="01:00">01:00</option>
                      <option value="02:00">02:00</option>
                      <option value="03:00">03:00</option>
                      <option value="04:00">04:00</option>
                      <option value="05:00">05:00</option>
                      <option value="06:00">06:00</option>
                      <option value="07:00">07:00</option>
                      <option value="08:00">08:00</option>
                      <option value="09:00">09:00</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="13:00">13:00</option>
                      <option value="14:00">14:00</option>
                      <option value="15:00">15:00</option>
                      <option value="16:00">16:00</option>
                      <option value="17:00">17:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12 mb20">
                  <h5>Return Date & Time</h5>
                  <div class="date-time-field">
                    <input type="text" id="date-picker-2" name="returnDate" required>
                    <select name="returnTime" id="collection-time" required>
                      <option value="00:00" selected>00:00</option>
                      <option value="01:00">01:00</option>
                      <option value="02:00">02:00</option>
                      <option value="03:00">03:00</option>
                      <option value="04:00">04:00</option>
                      <option value="05:00">05:00</option>
                      <option value="06:00">06:00</option>
                      <option value="07:00">07:00</option>
                      <option value="08:00">08:00</option>
                      <option value="09:00">09:00</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="13:00">13:00</option>
                      <option value="14:00">14:00</option>
                      <option value="15:00">15:00</option>
                      <option value="16:00">16:00</option>
                      <option value="17:00">17:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12 mb20">
                  <h5>Status Penyewaan</h5>
                  <select name="status_penyewaan" class="form-control" required>
                    <option>Pilih status penyewaan</option>
                    <option value="Lepas Kunci">Lepas Kunci</option>
                    <option value="Dengan Driver">Dengan Driver</option>
                  </select>
                </div>
              </div>

              <!-- <input type='submit' id='send_message' value='Book Now' class="btn-main btn-fullwidth"> -->
              <button type="submit" class="btn-main btn-fullwidth">Book Now</button=>
                <div class="clearfix"></div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


</div>

<?= $this->endSection() ?>