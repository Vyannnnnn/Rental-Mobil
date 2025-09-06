    <!-- header begin -->
    <header class="transparent scroll-light has-topbar">
      <div id="topbar" class="topbar-dark text-light">
        <div class="container">
          <div class="topbar-left xs-hide">
            <div class="topbar-widget">
              <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+62 812 2656 9961</a></div>
              <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>unggulrentcar@gmail.com</a>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="de-flex sm-pt10">
              <div class="de-flex-col">
                <div class="de-flex-col">
                  <!-- logo begin -->
                  <div id="logo">
                    <a href="index.html">
                      <img class="logo-1" src="<?= base_url() ?>/assets/images/logo-light.png" alt="">
                      <img class="logo-2" src="<?= base_url() ?>/assets/images/logo.png" alt="">
                    </a>
                  </div>
                  <!-- logo close -->
                </div>
              </div>
              <div class="de-flex-col header-col-mid">
                <ul id="mainmenu">
                  <li><a class="menu-item" href="<?= base_url('/') ?>">Home</a></li>
                  <li><a class="menu-item" href="<?= base_url('catalog') ?>">Catalog</a></li>
                  <li><a class="menu-item" href="<?= base_url('about-us') ?>">About Us</a></li>
                  <li><a class="menu-item" href="<?= base_url('contact-us') ?>">Contact Us</a></li>
                </ul>
              </div>

              <?php if (logged_in()) : ?>
                <div class="de-flex-col" style="background-size: 100%; background-repeat: no-repeat;">
                  <div class="menu_side_area" style="background-size: 100%; background-repeat: no-repeat;">
                    <div class="de-login-menu" style="background-size: 100%; background-repeat: no-repeat;">

                      <span id="de-click-menu-profile" class="de-menu-profile">
                        <img src="<?= base_url() ?>/stisla/img/avatar/avatar-2.png" class="img-fluid" alt="">
                      </span>

                      <div id="de-submenu-profile" class="de-submenu" style="background-size: 100%; background-repeat: no-repeat;">
                        <div class="d-name" style="background-size: 100%; background-repeat: no-repeat;">
                          <h4><?= user()->fullname ?></h4>
                          <span class="text-gray"><?= user()->email ?></span>
                        </div>
                        <div class="d-line" style="background-size: 100%; background-repeat: no-repeat;"></div>

                        <ul class="menu-col">
                          <!-- <li><a href="account-profile.html"><i class="fa fa-user"></i>My Profile</a></li> -->
                          <li><a href="<?= base_url('riwayat-pemesanan') ?>"><i class="fa fa-calendar"></i>My Orders</a></li>
                          <li><a href="<?= route_to('logout') ?>"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                        </ul>
                      </div>
                      <span id="menu-btn"></span>
                    </div>
                  </div>
                </div>
              <?php else : ?>
                <div class="de-flex-col">
                  <div class="menu_side_area">
                    <a href="<?= route_to('login') ?>" class="btn-main">Sign In</a>
                    <a href="<?= route_to('register') ?>" class="btn-main">Register</a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- header close -->