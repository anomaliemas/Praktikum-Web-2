<?php
require_once("Koneksi.php");

// --- FUNGSI MEMBER ---
function getMember() {
    return koneksi()->query("SELECT * FROM member")->fetchAll(PDO::FETCH_ASSOC);
}
function getMemberById($id) {
    $stmt = koneksi()->prepare("SELECT * FROM member WHERE id_member=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar) {
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terkahir_bayar) VALUES (?, ?, ?, ?, ?)";
    koneksi()->prepare($sql)->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar]);
}
function updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar) {
    $sql = "UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terkahir_bayar=? WHERE id_member=?";
    koneksi()->prepare($sql)->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_bayar, $id]);
}
function deleteMember($id) {
    koneksi()->prepare("DELETE FROM member WHERE id_member=?")->execute([$id]);
}

// --- FUNGSI BUKU ---
function getBuku() {
    return koneksi()->query("SELECT * FROM buku")->fetchAll(PDO::FETCH_ASSOC);
}
function getBukuById($id) {
    $stmt = koneksi()->prepare("SELECT * FROM buku WHERE id_buku=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
    koneksi()->prepare($sql)->execute([$judul, $penulis, $penerbit, $tahun]);
}
function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $sql = "UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?";
    koneksi()->prepare($sql)->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}
function deleteBuku($id) {
    koneksi()->prepare("DELETE FROM buku WHERE id_buku=?")->execute([$id]);
}

// --- FUNGSI PEMINJAMAN ---
function getPeminjaman() {
    return koneksi()->query("SELECT * FROM peminjaman")->fetchAll(PDO::FETCH_ASSOC);
}
function getPeminjamanById($id) {
    $stmt = koneksi()->prepare("SELECT * FROM peminjaman WHERE id_peminjaman=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    try {
        $pdo = koneksi();
        $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (:id_member, :id_buku, :tgl_pinjam, :tgl_kembali)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id_member' => $id_member, 'id_buku' => $id_buku, 'tgl_pinjam' => $tgl_pinjam, 'tgl_kembali' => $tgl_kembali]);
        echo "<script>alert('Data berhasil ditambahkan');window.location='Peminjaman.php'</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal: ID Member atau ID Buku belum terdaftar di sistem');window.location='FormPeminjaman.php'</script>";
    }
}
function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $sql = "UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?";
    koneksi()->prepare($sql)->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id]);
}
function deletePeminjaman($id) {
    koneksi()->prepare("DELETE FROM peminjaman WHERE id_peminjaman=?")->execute([$id]);
}
?>
