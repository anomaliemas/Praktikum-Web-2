<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Form Buku</h2>

<form action="<?= base_url(isset($buku) ? 'buku/update/'.$buku['id'] : 'buku/store') ?>" method="POST">
    
    <label>Judul Buku</label>
    <input type="text" name="judul" value="<?= old('judul', $buku['judul'] ?? '') ?>">
    <?php if(isset($validation) && $validation->getError('judul')): ?>
        <div class="alert-danger"><?= $validation->getError('judul') ?></div>
    <?php endif; ?>

    <label>Penulis</label>
    <input type="text" name="penulis" value="<?= old('penulis', $buku['penulis'] ?? '') ?>">
    <?php if(isset($validation) && $validation->getError('penulis')): ?>
        <div class="alert-danger"><?= $validation->getError('penulis') ?></div>
    <?php endif; ?>

    <label>Penerbit</label>
    <input type="text" name="penerbit" value="<?= old('penerbit', $buku['penerbit'] ?? '') ?>">
    <?php if(isset($validation) && $validation->getError('penerbit')): ?>
        <div class="alert-danger"><?= $validation->getError('penerbit') ?></div>
    <?php endif; ?>

    <label>Tahun Terbit</label>
    <input type="number" name="tahun_terbit" value="<?= old('tahun_terbit', $buku['tahun_terbit'] ?? '') ?>">
    <?php if(isset($validation) && $validation->getError('tahun_terbit')): ?>
        <div class="alert-danger"><?= $validation->getError('tahun_terbit') ?></div>
    <?php endif; ?>

    <button type="submit" class="btn">Simpan</button>
    <a href="<?= base_url('buku') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>