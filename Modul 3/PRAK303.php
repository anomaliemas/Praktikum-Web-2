<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK303</title>
</head>

<body>
    <form action="" method="post">
        <label for="bawah">Batas Bawah :</label>
        <input type="number" name="bawah" value="<?= $_POST['bawah'] ?? '' ?>"> <br>
        <label for="atas">Batas Atas :</label>
        <input type="number" name="atas" value="<?= $_POST['atas'] ?? '' ?>"> <br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $bawah = $_POST['bawah'];
        $atas = $_POST['atas'];
        $i = $bawah;

        do {
            if (($i + 7) % 5 == 0) {
                echo "<img style='width: 15px;' src='Gambar-Bintang.png' alt='Bintang'> ";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $atas);
    }
    ?>
</body>

</html>