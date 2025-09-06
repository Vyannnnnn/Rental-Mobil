<?php if (session()->getFlashdata('gagal')) : ?>
  <div class="alert alert-danger" role="alert">
    <?= session()->getFlashdata('gagal') ?>
  </div>
<?php elseif (session()->getFlashdata('berhasil')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('berhasil') ?>
  </div>
<?php endif; ?>