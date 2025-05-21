<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-5">
      <div class="card border-secondary mt-1">
        <div class="card-header text-bg-success fw-bold fs-5 text-center">Tambah Data Buku</div>
        <div class="row justify-content-center">
          <div class="col-sm-11 p-4">
            <form action="/add-data/save" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="judul" class="col-sm-4 col-form-label">Judul</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" name="judul" id="judul" placeholder="Contoh: Laskar Pelangi" value="<?= old('judul'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="penulis" class="col-sm-4 col-form-label">Penulis</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" name="penulis" id="penulis" placeholder="Contoh: Andrea Hirata" value="<?= old('penulis'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validation->getError('penulis'); ?>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="penerbit" class="col-sm-4 col-form-label">Penerbit</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" name="penerbit" id="penerbit" placeholder="Contoh: Bentang Pustaka" value="<?= old('penerbit'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validation->getError('penerbit'); ?>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="tahun_terbit" class="col-sm-4 col-form-label">Tahun terbit</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= ($validation->hasError('tahun_terbit')) ? 'is-invalid' : ''; ?>" name="tahun_terbit" id="tahun_terbit" placeholder="Contoh: 2005" value="<?= old('tahun_terbit'); ?>" />
                  <div class="invalid-feedback">
                    <?= $validation->getError('tahun_terbit'); ?>
                  </div>
                </div>
              </div>

              <div class="container-fluid px-0 mt-4">
                <div class="row justify-content-between">
                  <div class="col">
                    <a href="<?= base_url('/table'); ?>" class="btn btn-outline-success"><i class="bi bi-arrow-left"></i> Kembali</a>
                  </div>
                  <div class="col text-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>