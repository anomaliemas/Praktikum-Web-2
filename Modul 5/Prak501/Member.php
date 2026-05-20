<?php
ob_start();
require("Model.php");
require("Style.php");

if (isset($_GET['hapus'])) {
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member - Perpustakaan</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <span class="nav-title">Sistem Perpustakaan</span>
            <a href="Member.php" class="btn">Member</a>
            <a href="Buku.php" class="btn btn-secondary">Buku</a>
            <a href="Peminjaman.php" class="btn btn-secondary">Peminjaman</a>
        </div>
        
        <h2>Data Member</h2>
        
        <div style="margin-bottom: 20px;">
            <a href="FormMember.php" class="btn">+ Tambah Member</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tgl Mendaftar</th>
                    <th>Tgl Terakhir Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $members = getMember();
                $no = 1;
                if (count($members) > 0) {
                    foreach ($members as $row) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td><strong>{$row['nama_member']}</strong></td>";
                        echo "<td>{$row['nomor_member']}</td>";
                        echo "<td>{$row['alamat']}</td>";
                        echo "<td>" . date('d M Y', strtotime($row['tgl_mendaftar'])) . "</td>";
                        echo "<td>" . date('d M Y', strtotime($row['tgl_terkahir_bayar'])) . "</td>";
                        echo "<td class='btn-group'>
                                <a href='FormMember.php?id_member={$row['id_member']}' class='btn'>Edit</a>
                                <a href='Member.php?hapus={$row['id_member']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus data member ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='empty-state'><p>Belum ada data member</p><a href='FormMember.php' class='btn'>+ Tambah Member Pertama</a></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
