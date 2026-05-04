<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK304</title>
</head>

<body>
    <?php
    $bintang = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bintang = (int)$_POST['bintang'];
    }
    if (isset($_POST['tambah'])) {
        $bintang++;
    }
    if (isset($_POST['kurang'])) {
        $bintang--;
    }
    ?>

    <?php if ($bintang == 0) : ?>
        <form action="" method="post">
            <label for="bintang">Jumlah bintang</label>
            <input type="number" name="bintang" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php else : ?>
        Jumlah bintang <?= $bintang ?><br><br>
        
        <?php
        for ($i = 0; $i < $bintang; $i++) {
            echo "<img style='width: 70px;' src='Gambar-Bintang.png' alt='bintang'>";
        }
        ?>
        <form action="" method="post">
            <input type="hidden" name="bintang" value="<?= $bintang ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>
</body>

</html>