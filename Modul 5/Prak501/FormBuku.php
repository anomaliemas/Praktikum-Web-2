<?php
require("Model.php");
require("Style.php");

$id = $_GET['id_buku'] ?? '';
$judul = '';
$penulis = '';
$penerbit = '';
$tahun = '';

if ($id) {
    $data = getBukuById($id);
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];
}

if (isset($_POST['submit'])) {
    if ($id) {
        updateBuku($id, $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    } else {
        insertBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    }
    header("Location: Buku.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Form Buku</title></head>
<body>
    <h2>Form Buku</h2>
    <form method="POST">
        <label>Judul Buku:</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($judul) ?>" required>
        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?= htmlspecialchars($penulis) ?>" required>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="<?= htmlspecialchars($penerbit) ?>" required>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun" value="<?= htmlspecialchars($tahun) ?>" required>
        <button type="submit" name="submit" class="btn">Simpan</button>
        <a href="Buku.php" class="btn">Kembali</a>
    </form>
</body>
</html>