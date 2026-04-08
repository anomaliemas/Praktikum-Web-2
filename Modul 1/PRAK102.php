<?php
$alas = 7.9;
$tinggi_segitiga = 5.4;
$tinggi_prisma = 8.9;

$volume = (0.5 * $alas * $tinggi_segitiga) * $tinggi_prisma;
echo number_format($volume, 3) . " m3";
?>