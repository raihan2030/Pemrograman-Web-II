<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-5">
      <div class="card border-secondary mt-5">
        <div class="card-header text-bg-success fw-bold fs-5 text-center">Login</div>

        <div class="row justify-content-center">
          <div class="col-sm-11 px-4 mt-2 mb-2">
              <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger my-0 p-3">
                <i class="bi bi-exclamation-triangle-fill"></i> <?= session()->getFlashdata('error') ?>
              </div>
              <?php endif; ?>
            </div>
          </div>

        <div class="row justify-content-center">
          <div class="col-sm-11 px-4 pb-4">
            <form action="/login/validation" method="post">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username Anda" value="<?= old('username'); ?>" />
                <div class="invalid-feedback">
                  <?= $validation->getError('username'); ?>
                </div>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="example@example.com" value="<?= old('email'); ?>" />
                <div class="invalid-feedback">
                  <?= $validation->getError('email'); ?>
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password Anda" value="<?= old('password'); ?>" />
                <div class="invalid-feedback">
                  <?= $validation->getError('password'); ?>
                </div>
              </div>
              <div class="row px-2 mt-4">
                <button type="submit" class="btn btn-success ms-auto">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>