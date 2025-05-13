<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="row py-3">
                <h1 class="text-center">About Me</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img id="pas-foto" src="<?= $profile['pasFoto']; ?>" alt="">
                </div>
                <div class="col-md-2">
                    <p class="fs-4">Nama: </p>
                    <p class="fs-4">NIM: </p>
                    <p class="fs-4">Asal Prodi: </p>
                    <p class="fs-4">Hobi: </p>
                    <p class="fs-4">Skill: </p>
                    <p class="fs-4">Alamat: </p>
                </div>
                <div class="col">
                    <p class="fs-4"><?= $profile['nama']; ?></p>
                    <p class="fs-4"><?= $profile['nim']; ?></p>
                    <p class="fs-4"><?= $profile['asalProdi']; ?></p>
                    <p class="fs-4"><?= $profile['hobi']; ?></p>
                    <p class="fs-4"><?= $profile['skill']; ?></p>
                    <p class="fs-4"><?= $profile['alamat']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>