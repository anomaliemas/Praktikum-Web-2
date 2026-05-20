<?php
ob_start();
require("Model.php");
require("Style.php");

if (isset($_GET['hapus'])) {
    deleteBuku($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <span class="nav-title">Sistem Perpustakaan</span>
            <a href="Member.php" class="btn btn-secondary">Member</a>
            <a href="Buku.php" class="btn">Buku</a>
            <a href="Peminjaman.php" class="btn btn-secondary">Peminjaman</a>
        </div>
        
        <h2>Data Buku</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="FormBuku.php" class="btn">+ Tambah Buku</a>
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
                <?php
                $buku = getBuku();
                $no = 1;
                if (count($buku) > 0) {
                    foreach ($buku as $row) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td><strong>{$row['judul_buku']}</strong></td>";
                        echo "<td>{$row['penulis']}</td>";
                        echo "<td>{$row['penerbit']}</td>";
                        echo "<td>{$row['tahun_terbit']}</td>";
                        echo "<td class='btn-group'>
                                <a href='FormBuku.php?id_buku={$row['id_buku']}' class='btn'>Edit</a>
                                <a href='Buku.php?hapus={$row['id_buku']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus buku ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    eecho "<tr><td colspan='6'>Belum ada data peminjaman</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
