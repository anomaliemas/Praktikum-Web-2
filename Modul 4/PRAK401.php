<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        td,
        tr {
            border-collapse: collapse;
            border: 1px solid;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    $panjang = "";
    $lebar = "";
    $nilai = "";
    $output = "";

    if (isset($_POST['submit'])) {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $nilai = $_POST['nilai'];

        $nilaiArray = explode(" ", $nilai);
        $jumlahNilai = count($nilaiArray);
        $ukuranMatriks = $panjang * $lebar;

        if ($jumlahNilai != $ukuranMatriks) {
            $output = "Panjang nilai tidak sesuai dengan ukuran matriks";
        } else {
            $output = "<table>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                $output .= "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    $output .= "<td>" . $nilaiArray[$index] . "</td>";
                    $index++;
                }
                $output .= "</tr>";
            }
            $output .= "</table>";
        }
    }
    ?>

    <form action="" method="post">
        Panjang : <input type="number" name="panjang" value="<?= htmlspecialchars($panjang) ?>"><br>
        Lebar : <input type="number" name="lebar" value="<?= htmlspecialchars($lebar) ?>"><br>
        Nilai : <input type="text" name="nilai" value="<?= htmlspecialchars($nilai) ?>"><br>
        <input type="submit" name="submit" value="Cetak" style="margin-bottom: 10px;">
    </form>

    <?= $output ?>

</body>
</html>