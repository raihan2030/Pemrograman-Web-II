<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Navigasi -->
<nav class="navbar navbar-expand-lg bg text-bg-success">
  <div class="container">
    <a class="navbar-brand text-bg-success fw-bold" href="#">Database Buku</a>
    <div class="d-flex align-items-center">
      <?php if(session()->get('user_name')): ?>
        <p class="mb-0 me-4">Selamat datang, <?= session()->get('user_name'); ?></p>
        <?php endif ?>
      <a class="btn btn-outline-light border-2 fw-bold" href="<?= base_url('/logout'); ?>" onclick="return confirm('Apakah Anda benar-benar ingin keluar?')">Log Out</a>
    </div>
  </div>
</nav>
<!-- Akhir Navigasi -->

<!-- Konten Utama -->
<div class="container mt-3">
  <div class="row text-center">
    <div class="col border-bottom border-secondary">
      <p class="fs-3 fw-bold mb-2">Tabel Buku</p>
    </div>
  </div>
  <div class="row">
    <div class="col px-0">
      <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-primary mt-2 mb-0" role="alert">
          <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif ?>
    </div>
  </div>
  <div class="row">
    <div class="col ps-0">
      <a class="btn btn-primary my-2" href="<?= base_url('/add-data'); ?>">Tambah Data <i class="bi bi-plus-circle"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="col p-0">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-success border-secondary text-center align-middle">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Judul</th>
              <th scope="col">Penulis</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tahun Terbit</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody class="border-secondary align-middle">
            <?php foreach ($listBuku as $buku): ?>
              <tr>
                <th scope="row"><?= $buku['id']; ?></th>
                <td><?= $buku['judul']; ?></td>
                <td><?= $buku['penulis']; ?></td>
                <td><?= $buku['penerbit']; ?></td>
                <td><?= $buku['tahun_terbit']; ?></td>
                <td class="text-center">
                  <a class="btn btn-warning" href="<?= base_url('/edit-data') . '/' . $buku['id']; ?>">Ubah</a>

                  <form action="/delete-data/<?= $buku['id']; ?>" method="post" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                  </form>

                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Konten Utama -->
<?= $this->endSection(); ?>