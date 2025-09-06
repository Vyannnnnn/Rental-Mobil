<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Data Armada</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <a class="btn btn-success mb-3" href="<?= base_url('tambah-armada') ?>">
    Tambah
  </a>

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
                  <th>Gambar</th>
                  <th>Model</th>
                  <th>Tahun</th>
                  <th>Transmisi</th>
                  <th>Status</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($armada as $armada) :
                ?>
                  <tr>
                    <td class="text-center"><?= $i++ ?></td>
                    <td class="text-center">
                      <img src="<?= base_url() ?>/img/<?= $armada['image'] ?>" width="200px" alt="">
                    </td>
                    <td><?= $armada['merk'] . ' ' . $armada['model']  ?></td>
                    <td class="text-center"><?= $armada['year'] ?></td>
                    <td><?= $armada['transmission'] ?></td>
                    <td>
                      <div class="badge badge-info"><?= $armada['status'] ?></div>
                    </td>
                    <td><?= number_to_currency((float)($armada['price'] ?? 0), 'IDR') ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('data-armada/' . $armada['id']) ?>" class="btn btn-warning">Edit</a>
                      <button class="btn-delete btn btn-danger ml-1" type="button" data-title="Hapus Armada" data-body="#modal-delete-armada" data-id="<?= $armada['id']; ?>">Hapus</button>
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
<?= $this->endSection() ?>

<?= $this->section('admin-script') ?>
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