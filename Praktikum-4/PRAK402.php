<?php
$dataNilai = [
    ["Nama" => "Andi", "NIM" => "2101001", "UTS" => 87, "UAS" => 65],
    ["Nama" => "Budi", "NIM" => "2101002", "UTS" => 76, "UAS" => 79],
    ["Nama" => "Tono", "NIM" => "2101003", "UTS" => 50, "UAS" => 41],
    ["Nama" => "Jessica", "NIM" => "2101004", "UTS" => 60, "UAS" => 75],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK402</title>
    <style>
        th {
            background-color: lightgray;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataNilai as $data): ?>
                <tr>
                    <td><?php echo $data["Nama"]; ?></td>
                    <td><?php echo $data["NIM"]; ?></td>
                    <td><?php echo $data["UTS"]; ?></td>
                    <td><?php echo $data["UAS"]; ?></td>
                    <td><?php echo ($data["UTS"] * 0.4) + ($data["UAS"] * 0.6); ?></td>
                    <td>
                        <?php
                            $nilaiAkhir = ($data["UTS"] * 0.4) + ($data["UAS"] * 0.6);
                            if ($nilaiAkhir >= 80) {
                                echo "A";
                            } elseif ($nilaiAkhir >= 70) {
                                echo "B";
                            } elseif ($nilaiAkhir >= 60) {
                                echo "C";
                            } elseif ($nilaiAkhir >= 50) {
                                echo "D";
                            } else {
                                echo "E";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>