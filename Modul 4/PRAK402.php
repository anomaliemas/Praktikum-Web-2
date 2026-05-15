<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        th {
            border: solid 1px black;
            border-collapse: collapse;
            text-align: left;
            padding: 5px 25px 5px 6px;
        }

        th {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php
        $list = [
            ["nama" => "Andi", "nim" => "2101001", "nilaiuts" => 87, "nilaiuas" => 65],
            ["nama" => "Budi", "nim" => "2101002", "nilaiuts" => 76, "nilaiuas" => 79],
            ["nama" => "Tono", "nim" => "2101003", "nilaiuts" => 50, "nilaiuas" => 41],
            ["nama" => "Jessica", "nim" => "2101004", "nilaiuts" => 60, "nilaiuas" => 75]
        ];

        foreach ($list as $data) {
            $nilai_akhir = ($data['nilaiuts'] * 0.4) + ($data['nilaiuas'] * 0.6);
            $nilai_akhir_format = ($nilai_akhir == floor($nilai_akhir)) ? number_format($nilai_akhir, 0) : number_format($nilai_akhir, 1);

            if ($nilai_akhir >= 80) {
                $huruf = 'A';
            } elseif ($nilai_akhir >= 70) {
                $huruf = 'B';
            } elseif ($nilai_akhir >= 60) {
                $huruf = 'C';
            } elseif ($nilai_akhir >= 50) {
                $huruf = 'D';
            } else {
                $huruf = 'E';
            }

            echo "<tr>";
            echo "<td>{$data['nama']}</td>";
            echo "<td>{$data['nim']}</td>";
            echo "<td>{$data['nilaiuts']}</td>";
            echo "<td>{$data['nilaiuas']}</td>";
            echo "<td>{$nilai_akhir_format}</td>";
            echo "<td>{$huruf}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>