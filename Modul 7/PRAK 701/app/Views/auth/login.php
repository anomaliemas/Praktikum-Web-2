<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Login Sistem</h2>

<form action="<?= base_url('login') ?>" method="POST">
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn">Login</button>
</form>

<?= $this->endSection() ?>