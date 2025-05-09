<?php
require '../config/Koneksi.php';
require '../models/Model.php';

if(isset($_GET['deleteId'])){
    try {
        deleteData($conn, "BUKU", (int)$_GET['deleteId']);
        header("Location: ../tables/Buku.php");
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('".$e->getMessage()."'); window.location.href='../tables/Buku.php';</script>";
    }
}

$data = getAllData($conn, "BUKU");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Buku</title>
    <link rel="stylesheet" href="../styles/tableStyle.css">
</head>
<body>
    <div id="container">
        <div id="add-back-container">
            <a href="../index.php" class="add-back-btn">Kembali</a>
            <a href="../forms/BukuForm.php" class="add-back-btn">Tambah Data</a>
        </div>
        <table id="data-table">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id_buku']?></td>
                        <td><?= $value['judul_buku']?></td>
                        <td><?= $value['penulis']?></td>
                        <td><?= $value['penerbit']?></td>
                        <td><?= $value['tahun_terbit']?></td>
                        <td>
                            <div class="opt-container">
                                <form action="../forms/BukuForm.php" method="get">
                                    <input type="hidden" name="id" value="<?=$value['id_buku']?>">
                                    <button class="opt-btn edit-btn" type="submit">Edit</button>
                                </form>
                                <form action="" method="get" class="deleteForm">
                                    <input type="hidden"  name="deleteId" value="<?=$value['id_buku']?>">
                                    <button class="opt-btn delete-btn" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.deleteForm').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!confirm("Apakah anda yakin ingin menghapus data ini?")) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>