<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK201</title>
</head>
<body>
    <form action="" method="POST">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <input type="submit" name="submit" value="Urutkan">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = $_POST['nama1'];
        $n2 = $_POST['nama2'];
        $n3 = $_POST['nama3'];

        echo "<h3>Output</h3>";

        if ($n1 <= $n2 && $n1 <= $n3) {
            if ($n2 <= $n3) {
                echo "$n1 <br> $n2 <br> $n3";
            } else {
                echo "$n1 <br> $n3 <br> $n2";
            }
        } elseif ($n2 <= $n1 && $n2 <= $n3) {
            if ($n1 <= $n3) {
                echo "$n2 <br> $n1 <br> $n3";
            } else {
                echo "$n2 <br> $n3 <br> $n1";
            }
        } else {
            if ($n1 <= $n2) {
                echo "$n3 <br> $n1 <br> $n2";
            } else {
                echo "$n3 <br> $n2 <br> $n1";
            }
        }
    }
    ?>
</body>
</html>