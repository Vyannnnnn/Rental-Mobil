<?= $this->extend('admin/layout/index') ?>

<?= $this->section('admin-section') ?>


<div class="section-header">
  <div class="section-header-back">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
  </div>
  <h1>Tambah Data Armada</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
    <div class="breadcrumb-item">Tambah Armada</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Tambahkan data armada baru</h2>
  <p class="section-lead">
    On this page you can create a new post and fill in all fields.
  </p>

  <div class="row">
    <div class="col-12">
      <?= $this->include('admin/layout/alert'); ?>
      <div class="card">
        <form method="POST" action="/Admin/Armada/add" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="card-body row">
            <div class="form-group col-6 mb-4 ">
              <label>Merk</label>
              <input class="form-control" type="text" name="merk" placeholder="ex: Honda">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Model</label>
              <input class="form-control" type="text" name="model" placeholder="ex: HRV">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Type</label>
              <select class="form-control" name="type" id="type">
                <option>Pilih tipe armada...</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Sedan">Sedan</option>
                <option value="Wagon">Wagon</option>
                <option value="Pickup Truck">Pickup Truck</option>
                <option value="SUV">SUV</option>s
                <option value="Minivan">Minivan</option>
                <option value="Sport Car">Sport Car</option>
                <option value="Coupe">Coupe</option>
                <option value="Crossover">Crossover</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Tahun</label>
              <input class="form-control" type="text" name="year" placeholder="ex: 2023">
            </div>
            <div class="form-group col-12 mb-4 ">
              <label>Deskripsi</label>
              <textarea name="desc" class="summernote-simple" style="display: none;"></textarea>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Plat Nomor</label>
              <input class="form-control" type="text" name="plat_no" placeholder="AD 1234 AOC">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Kapasitas</label>
              <input class="form-control" type="text" name="capacity" placeholder="ex: 4">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Transmisi</label>
              <select class="form-control" name="transmission" id="transmission">
                <option>Pilih transmisi mobil...</option>
                <option value="Manual">Manual</option>
                <option value="Automatic">Automatic</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Bahan Bakar</label>
              <input class="form-control" type="text" name="fuel" placeholder="ex: Bensin">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Warna Mobil</label>
              <input class="form-control" type="text" name="color" placeholder="ex: Black Metalic">
            </div>
            <div class="form-group col-6 mb-4 ">
              <label>Harga Sewa</label>
              <input class="form-control" type="text" name="price" placeholder="ex: 1500000">
            </div>
            <div class="form-group col-6 mb-4">
              <label>Status</label>
              <select class="form-control" name="status" id="status">
                <option>Pilih status armada...</option>
                <option value="ready">Ready</option>
                <option value="not-ready">Not Ready</option>
              </select>
            </div>
            <div class="form-group col-6 mb-4">
              <label>Gambar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
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
<?= $this->endSection() ?>

<?= $this->section('admin-script') ?>
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