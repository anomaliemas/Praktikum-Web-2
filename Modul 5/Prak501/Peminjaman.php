<?php
ob_start();
require("Model.php");
require("Style.php");

if (isset($_GET['hapus'])) {
    deletePeminjaman($_GET['hapus']);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <span class="nav-title">Sistem Perpustakaan</span>
            <a href="Member.php" class="btn btn-secondary">Member</a>
            <a href="Buku.php" class="btn btn-secondary">Buku</a>
            <a href="Peminjaman.php" class="btn">Peminjaman</a>
        </div>
        
        <h2>Data Peminjaman</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="FormPeminjaman.php" class="btn">+ Tambah Peminjaman</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Member</th>
                    <th>ID Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $peminjaman = getPeminjaman();
                $no = 1;
                if (count($peminjaman) > 0) {
                    foreach ($peminjaman as $row) {
                        $today = date('Y-m-d');
                        $tglKembali = $row['tgl_kembali'];
                        $status = ($today > $tglKembali) ? '<span class="badge badge-inactive">Terlambat</span>' : '<span class="badge badge-active">Aktif</span>';
                        
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['nama_member']}</td>";
                        echo "<td>{$row['judul_buku']}</td>";
                        echo "<td>" . date('d M Y', strtotime($row['tgl_pinjam'])) . "</td>";
                        echo "<td>" . date('d M Y', strtotime($row['tgl_kembali'])) . "</td>";
                        echo "<td>{$status}</td>";
                        echo "<td class='btn-group'>
                                <a href='FormPeminjaman.php?id_peminjaman={$row['id_peminjaman']}' class='btn'>Edit</a>
                                <a href='Peminjaman.php?hapus={$row['id_peminjaman']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data peminjaman ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                echo "<tr><td colspan='6'>Belum ada data peminjaman</td></tr>";}
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
