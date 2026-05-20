<?php
ob_start();
require("Model.php");
require("Style.php");
date_default_timezone_set('Asia/Makassar');

$id = $_GET['id_peminjaman'] ?? '';
$id_member = '';
$id_buku = '';
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days'));

if ($id) {
    $data = getPeminjamanById($id);
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];
}

if (isset($_POST['submit'])) {
    if ($id) {
        updatePeminjaman($id, $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    } else {
        insertPeminjaman($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    header("Location: Peminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Form Peminjaman</title></head>
<body>
    <h2>Form Peminjaman</h2>
    <form method="POST">
        <label>ID Member:</label>
        <input type="number" name="id_member" value="<?= htmlspecialchars($id_member) ?>" required>
        <label>ID Buku:</label>
        <input type="number" name="id_buku" value="<?= htmlspecialchars($id_buku) ?>" required>
        <label>Tgl Pinjam:</label>
        <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam ?>" required>
        <label>Tgl Kembali:</label>
        <input type="date" name="tgl_kembali" value="<?= $tgl_kembali ?>" required>
        <button type="submit" name="submit" class="btn">Simpan</button>
        <a href="Peminjaman.php" class="btn">Kembali</a>
    </form>
</body>
</html>
