<?php
$daftarHP = array(
    "S22" => "Samsung Galaxy S22",
    "S22+" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy A03",
    "Xcover5" => "Samsung Galaxy Xcover 5"
);
?>

<html>
<head>
    <style>
        table, th, td { border: 1px solid black; }
        th { background-color: red; font-size: 25px; padding: 15px; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach ($daftarHP as $hp) : ?>
        <tr>
            <td><?= $hp ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>