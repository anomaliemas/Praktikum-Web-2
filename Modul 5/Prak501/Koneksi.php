<?php
function koneksi() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=perpustakaan', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
?>