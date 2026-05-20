<?php
function koneksi() {
    try {
        $pdo = new PDO('mysql:host=bt2ibfusmhlviamfvibw-mysql.services.clever-cloud.com;port=3306;dbname=bt2ibfusmhlviamfvibw', 'usyjrm71k3r3a49t', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
}
?>
