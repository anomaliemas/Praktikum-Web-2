<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK301</title>
</head>

<body>
    <form action="" method="post">
        <label for="jumlah">Jumlah Peserta :</label>
        <input type="number" name="jumlah" value="<?= $_POST['jumlah'] ?? '' ?>"> <br>
        <button type="submit" name="submit">Cetak</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $jumlah = $_POST['jumlah'];
        $i = 1;
        while ($i <= $jumlah) {
            $warna = ($i % 2 == 1) ? "red" : "green";
            echo "<h1 style='color: $warna'>Peserta ke-$i</h1>";
            $i++;
        }
    }
    ?>
</body>

</html>