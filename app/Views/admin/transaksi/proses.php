<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Transaksi Diproses</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Transaksi</h2>
  <p class="section-lead">Menampilkan seluruh data transaksi yang dilakukan pada website.</p>

  <?= $this->include('admin/layout/alert') ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th width="1rem">No</th>
                  <th>Pemesan</th>
                  <th>Armada</th>
                  <th>Tanggal Pickup</th>
                  <th>Tanggal Kembali</th>
                  <th>Biaya Sewa</th>
                  <th>Catatan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($transaksi as $key) :
                ?>
                  <tr>
                    <td class="text-center"><?= $i++ ?></td>
                    <td><?= $key['fullname'] ?></td>
                    <td class="text-center">
                      <?= $key['merk'] . ' ' . $key['model'] ?>
                    </td>
                    <td class="text-center"><?= date('d M Y', strtotime($key['pickup_date'])) ?></td>
                    <td class="text-center"><?= date('d M Y', strtotime($key['return_date'])) ?></td>
                    <td class="text-center">
                      <?= number_to_currency((float)($key['biaya_sewa'] ?? 0), 'IDR') ?>
                    </td>
                    <td class="text-center">
                      <?= $key['status_penyewaan'] ?>
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
                    <td class="text-center">
                      <a href="<?= base_url('data-transaksi/' . $key['id']) ?>" class="btn btn-warning">Detail</a>
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

<form class="modal-part" id="modal-delete-armada" action="/Admin/Armada/delete">
  <?= csrf_field(); ?>
  <p>Apakah anda yakin untuk menghapus armada ini?</p>
  <input type="hidden" name="id" id="id">
</form>

<script>
  $(document).on("click", ".btn-delete", function() {
    $(".modal-body #id").val($(this).data("id"));
  });

  // Show Modal Hapus Data
  $(".btn-delete").fireModal({
    title: $(".btn-delete").data("title"),
    body: $($(".btn-delete").data("body")),
    footerClass: "bg-whitesmoke",
    buttons: [{
        text: "Cancel",
        closeButton: true,
        class: "btn btn-secondary btn-shadow",
        handler: function(closeModal) {
          $.destroyModal(closeModal);
        },
      },
      {
        text: "Hapus",
        submit: true,
        class: "btn btn-danger btn-shadow",
        handler: function(modal) {},
      },
    ],
  });
</script>

<?= $this->endSection() ?>