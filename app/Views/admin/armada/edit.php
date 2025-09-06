<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>


<div class="section-header">
  <div class="section-header-back">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
  </div>
  <h1>Ubah Data Armada</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
    <div class="breadcrumb-item">Tambah Armada</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Ubah data armada</h2>
  <p class="section-lead">
    On this page you can update data armada.
  </p>

  <div class="row">
    <div class="col-12">
      <?= $this->include('admin/layout/alert'); ?>
      <div class="card">
        <form method="POST" action="/Admin/Armada/update" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <input class="form-control" type="hidden" name="id" placeholder="ex: Honda" value="<?= $data['id'] ?>">
          <div class="card-body row">
            <div class="form-group col-6 mb-4 ">
              <label>Merk</label>
              <input class="form-control" type="text" name="merk" placeholder="ex: Honda" value="<?= $data['merk'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Model</label>
              <input class="form-control" type="text" name="model" placeholder="ex: HRV" value="<?= $data['model'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Type</label>
              <select class="form-control" name="type" id="type">
                <option>Pilih tipe armada...</option>
                <option value="Sedan" <?= $data['type'] === 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                <option value="SUV" <?= $data['type'] === 'SUV' ? 'selected' : '' ?>>SUV</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Tahun</label>
              <input class="form-control" type="text" name="year" placeholder="ex: 2023" value="<?= $data['year'] ?>">
            </div>
            <div class="form-group col-12 mb-4 ">
              <label>Deskripsi</label>
              <textarea name="desc" class="summernote-simple" style="display: none;"><?= $data['desc'] ?></textarea>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Plat Nomor</label>
              <input class="form-control" type="text" name="plat_no" placeholder="AD 1234 AOC" value="<?= $data['plat_no'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Kapasitas</label>
              <input class="form-control" type="text" name="capacity" placeholder="ex: 4" value="<?= $data['capacity'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Transmisi</label>
              <select class="form-control" name="transmission" id="transmission">
                <option>Pilih transmisi mobil...</option>
                <option value="Manual" <?= $data['transmission'] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                <option value="Automatic" <?= $data['transmission'] === 'Automatic' ? 'selected' : '' ?>>Automatic</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Bahan Bakar</label>
              <input class="form-control" type="text" name="fuel" placeholder="ex: Bensin" value="<?= $data['fuel'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Warna Mobil</label>
              <input class="form-control" type="text" name="color" placeholder="ex: Black Metalic" value="<?= $data['color'] ?>">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Harga Sewa</label>
              <input class="form-control" type="text" name="price" placeholder="ex: 1500000" value="<?= $data['price'] ?>">
            </div>
            <div class="form-group col-6 mb-4">
              <label>Status</label>
              <select class="form-control" name="status" id="status">
                <option>Pilih status armada...</option>
                <option value="Ready" <?= $data['status'] === 'Ready' ? 'selected' : '' ?>>Ready</option>
                <option value="Not Ready" <?= $data['status'] === 'Not Ready' ? 'selected' : '' ?>>Not Ready</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4">
              <label>Gambar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div class="d-flex mt-3">
                <img style="width: auto; margin:0 20px 10px 0; height: 200px;" class="rounded" src="<?= base_url(); ?>/img/<?= $data['image']; ?>" alt="">
              </div>
              <div style="display: flex;" id="preview-images"></div>
            </div>
            <div class="col-12 d-flex justify-content-end">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $("#image").change(function() {
      $("#preview-images").empty();
      var total_file = document.getElementById("image").files.length;
      for (var i = 0; i < total_file; i++) {
        $("#preview-images").append("<img style='margin:10px 20px 10px 0;' src='" + URL.createObjectURL(event.target.files[i]) + "' height='200'><br>");
      }
    });
  });
</script>
<?= $this->endSection() ?>