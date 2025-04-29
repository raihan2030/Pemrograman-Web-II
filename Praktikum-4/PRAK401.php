<?php
$panjang = $lebar = $nilai = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $nilai = $_POST['nilai'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK401</title>
    <style>
        td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Panjang: <input type="number" name="panjang" id="panjang" value="<?= $panjang?>"><br>
        Lebar: <input type="number" name="lebar" id="lebar" value="<?= $lebar?>"><br>
        Nilai: <input type="text" name="nilai" id="nilai" value="<?= $nilai?>"><br>
        <button type="submit">Cetak</button><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $arrayNilai = explode(" ", $nilai);

        if($panjang == $lebar) {
            echo "<table border='1'>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    if (isset($arrayNilai[$index])) {
                        echo "<td>" . $arrayNilai[$index] . "</td>";
                    } else {
                        echo "<td></td>";
                    }
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            echo "<p>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
        }
    }
    ?>
</body>
</html>