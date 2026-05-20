<?php
ob_start();
require("Model.php");
require("Style.php");
date_default_timezone_set('Asia/Makassar');

$id = $_GET['id_member'] ?? '';
$nama = '';
$nomor = '';
$alamat = '';
$tgl_mendaftar = date('Y-m-d\TH:i');
$tgl_bayar = date('Y-m-d');

if ($id) {
    $data = getMemberById($id);
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar']));
    $tgl_bayar = $data['tgl_terkahir_bayar'];
}

if (isset($_POST['submit'])) {
    if ($id) {
        updateMember($id, $_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl_mendaftar'], $_POST['tgl_bayar']);
    } else {
        insertMember($_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['tgl_mendaftar'], $_POST['tgl_bayar']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
</head>
<body>
    <h2>Form Member</h2>
    <form method="POST">
        <label>Nama Member:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
        <label>Nomor Member:</label>
        <input type="text" name="nomor" value="<?= htmlspecialchars($nomor) ?>" required>
        <label>Alamat:</label>
        <textarea name="alamat" required><?= htmlspecialchars($alamat) ?></textarea>
        <label>Tgl Mendaftar:</label>
        <input type="datetime-local" name="tgl_mendaftar" value="<?= $tgl_mendaftar ?>" required>
        <label>Tgl Terakhir Bayar:</label>
        <input type="date" name="tgl_bayar" value="<?= $tgl_bayar ?>" required>
        <button type="submit" name="submit" class="btn">Simpan</button>
        <a href="Member.php" class="btn">Kembali</a>
    </form>
</body>
</html>
