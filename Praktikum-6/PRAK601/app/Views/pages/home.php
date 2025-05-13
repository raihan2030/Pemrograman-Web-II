<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row pt-5">
        <div class="col pt-5">
            <h1 class="text-center">Halo, nama saya <?= $profile['nama']; ?></h1>
            <h1 class="text-center">dengan NIM <?= $profile['nim']; ?></h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>