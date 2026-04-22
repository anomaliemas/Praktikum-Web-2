<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK203</title>
</head>
<body>
    <form action="" method="post">
        Nilai: <input type="number" name="nilai" step="any" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>" required><br>
        
        Dari:<br>
        <input type="radio" name="dari" value="celcius" <?= (isset($_POST['dari']) && $_POST['dari'] == "celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="dari" value="fahrenheit" <?= (isset($_POST['dari']) && $_POST['dari'] == "fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="reamur" <?= (isset($_POST['dari']) && $_POST['dari'] == "reamur") ? "checked" : "" ?>> Reamur<br>
        <input type="radio" name="dari" value="kelvin" <?= (isset($_POST['dari']) && $_POST['dari'] == "kelvin") ? "checked" : "" ?>> Kelvin<br>

        Ke:<br>
        <input type="radio" name="ke" value="celcius" <?= (isset($_POST['ke']) && $_POST['ke'] == "celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="ke" value="fahrenheit" <?= (isset($_POST['ke']) && $_POST['ke'] == "fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="reamur" <?= (isset($_POST['ke']) && $_POST['ke'] == "reamur") ? "checked" : "" ?>> Reamur<br>
        <input type="radio" name="ke" value="kelvin" <?= (isset($_POST['ke']) && $_POST['ke'] == "kelvin") ? "checked" : "" ?>> Kelvin<br>

        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if (isset($_POST["konversi"])) {
        if (!empty($_POST["dari"]) && !empty($_POST["ke"])) {
            $nilai = $_POST["nilai"];
            $dari = $_POST["dari"];
            $ke = $_POST["ke"];
            $celcius = 0;

            if ($dari == "celcius") { $celcius = $nilai; }
            elseif ($dari == "fahrenheit") { $celcius = ($nilai - 32) * 5/9; }
            elseif ($dari == "reamur") { $celcius = $nilai * 5/4; }
            elseif ($dari == "kelvin") { $celcius = $nilai - 273.15; }

            if ($ke == "celcius") { $hasil = $celcius; $satuan = "&deg;C"; }
            elseif ($ke == "fahrenheit") { $hasil = ($celcius * 9/5) + 32; $satuan = "&deg;F"; }
            elseif ($ke == "reamur") { $hasil = $celcius * 4/5; $satuan = "&deg;R"; }
            elseif ($ke == "kelvin") { $hasil = $celcius + 273.15; $satuan = "K"; }

            echo "<h2>Hasil Konversi: " . number_format($hasil, 1) . " $satuan</h2>";
        } else {
            echo "<h2 style='color:red;'>Pilih satuan asal dan tujuan!</h2>";
        }
    }
    ?>
</body>
</html>