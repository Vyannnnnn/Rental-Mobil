<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.madebydesignesia.com/themes/rentaly/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Apr 2023 18:17:34 GMT -->

<head>
  <title><?= $title ?></title>
  <link rel="icon" href="<?= base_url() ?>/assets/images/icon.png" type="image/gif" sizes="16x16">
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="<?= $title ?>" name="description">
  <meta content="" name="keywords">
  <meta content="" name="author">
  <!-- CSS Files
    ================================================== -->
  <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
  <link href="<?= base_url() ?>/assets/css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
  <link href="<?= base_url() ?>/assets/css/plugins.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>/assets/css/coloring.css" rel="stylesheet" type="text/css">
  <!-- color scheme -->
  <link id="colors" href="<?= base_url() ?>/assets/css/colors/scheme-01.css" rel="stylesheet" type="text/css">
</head>

<body onload="initialize()">
  <div id="wrapper">

    <!-- header section -->
    <?= $this->include('user/layout/header') ?>

    <!-- main section -->
    <?= $this->renderSection('user-section') ?>

    <a href="#" id="back-to-top"></a>

    <!-- footer section -->
    <?= $this->include('user/layout/footer') ?>
  </div>

  <!-- Javascript Files -->
  <?= $this->renderSection('user-script') ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins.js"></script>
  <script src="<?= base_url() ?>/assets/js/designesia.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>

</body>

</html>