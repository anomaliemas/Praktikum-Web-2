<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Data Buku</h2>

<div style="margin-bottom: 20px;">
    <a href="<?= base_url('buku/create') ?>" class="btn">+ Tambah Buku</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($buku as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><strong><?= esc($row['judul']) ?></strong></td>
            <td><?= esc($row['penulis']) ?></td>
            <td><?= esc($row['penerbit']) ?></td>
            <td><?= esc($row['tahun_terbit']) ?></td>
            <td class="btn-group">
                <a href="<?= base_url('buku/edit/'.$row['id']) ?>" class="btn">Edit</a>
                <a href="<?= base_url('buku/delete/'.$row['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>