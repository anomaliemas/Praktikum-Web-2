<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
        }
        th {
            background-color: #CCCDCC;
            padding: 5px 10px;
            border: 1px solid black;
            text-align: left;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
        }
        .revisi {
            background-color: red;
        }
        .tidak-revisi {
            background-color: #00B050;
        }
    </style>
</head>
<body>
    <?php
    $mahasiswa = [
        [
            "nama" => "Ridho",
            "matkul" => [
                ["sub" => "Pemrograman I", "sks" => 2],
                ["sub" => "Praktikum Pemrograman I", "sks" => 1],
                ["sub" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                ["sub" => "Arsitektur Komputer", "sks" => 3]
            ]
        ],
        [
            "nama" => "Ratna",
            "matkul" => [
                ["sub" => "Basis Data I", "sks" => 2],
                ["sub" => "Praktikum Basis Data I", "sks" => 1],
                ["sub" => "Kalkulus", "sks" => 3]
            ]
        ],
        [
            "nama" => "Tono",
            "matkul" => [
                ["sub" => "Rekayasa Perangkat Lunak", "sks" => 3],
                ["sub" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["sub" => "Komputasi Awan", "sks" => 3],
                ["sub" => "Kecerdasan Bisnis", "sks" => 3]
            ]
        ]
    ];

    foreach ($mahasiswa as &$m) {
        $total = 0;
        foreach ($m['matkul'] as $mk) {
            $total += $mk['sks'];
        }
        $m['total_sks'] = $total;
        $m['keterangan'] = ($total < 7) ? "Revisi KRS" : "Tidak Revisi";
    }
    unset($m); 
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($mahasiswa as $index => $m) : ?>
            <?php foreach ($m['matkul'] as $i => $mk) : ?>
                <tr>
                    <td><?= ($i == 0) ? $index + 1 : ""; ?></td>
                    <td><?= ($i == 0) ? $m['nama'] : ""; ?></td>
                    <td><?= $mk['sub']; ?></td>
                    <td><?= $mk['sks']; ?></td>
                    <td><?= ($i == 0) ? $m['total_sks'] : ""; ?></td>
                    
                    <?php 
                    $kelas_keterangan = "";
                    $teks_keterangan = "";
                    if ($i == 0) {
                        $kelas_keterangan = ($m['total_sks'] < 7) ? "revisi" : "tidak-revisi";
                        $teks_keterangan = $m['keterangan'];
                    }
                    ?>
                    
                    <td class="<?= $kelas_keterangan; ?>">
                        <?= $teks_keterangan; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>