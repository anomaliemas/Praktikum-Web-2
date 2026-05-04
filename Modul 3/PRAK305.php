<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK305</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="kata" value="<?= $_POST['kata'] ?? '' ?>" required>
        <button type="submit" name="submit">submit</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $kata = $_POST['kata'];
        $panjang = strlen($kata);
        $arr = str_split($kata);

        echo "<b>Input:</b><br>";
        echo "$kata<br><br>";
        echo "<b>Output:</b><br>";

        for ($i = 0; $i < $panjang; $i++) {
            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($arr[$i]);
                } else {
                    echo strtolower($arr[$i]);
                }
            }
        }
    }
    ?>
</body>

</html>