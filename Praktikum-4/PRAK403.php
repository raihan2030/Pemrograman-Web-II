<?php
$arrayData = [
    [
        "No" => 1,
        "Nama" => "Ridho", 
        "Mata Kuliah" => ["Pemrograman I", "Praktikum Pemrograman I", "Pengantar Lingkungan Lahan Basah", "Arsitektur Komputer"],
        "SKS" => [2, 1, 2, 3]
    ],
    [
        "No" => 2, 
        "Nama" => "Ratna",
        "Mata Kuliah" => ["Basis Data I", "Praktikum Basis Data I", "Kalkulus"],
        "SKS" => [2, 1, 3],
    ],
    [
        "No" => 3, 
        "Nama" => "Tono",
        "Mata Kuliah" => ["Rekayasa Perangkat Lunak", "Analisis dan Perancangan Sistem", "Komputasi Awan", "Kecerdasan Bisnis"],
        "SKS" => [3, 3, 3, 3],
    ]
];

function sumSKS($sksArray) {
    $total = 0;
    foreach ($sksArray as $sks) {
        $total += $sks;
    }
    return $total;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK403</title>
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
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayData as $data): ?>
                <?php for($i = 0; $i < count($data["Mata Kuliah"]); $i++): ?>
                    <tr>
                        <?php if ($i == 0): ?>
                            <td><?php echo $data["No"]; ?></td>
                            <td><?php echo $data["Nama"]; ?></td>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>

                        <td><?php echo $data["Mata Kuliah"][$i]; ?></td>
                        <td><?php echo $data["SKS"][$i]; ?></td>

                        <?php if ($i == 0): ?>
                            <td><?php echo sumSKS($data['SKS']) ?></td>
                            <?php if(sumSKS($data['SKS']) < 7): ?>
                                <td style="background-color: red;">Revisi KRS</td>
                            <?php else: ?>
                                <td style="background-color: lime;">Tidak Revisi</td>
                            <?php endif; ?>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                <?php endfor; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>