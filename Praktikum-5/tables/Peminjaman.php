<?php
require '../config/Koneksi.php';
require '../models/Model.php';

if(isset($_GET['deleteId'])){
    try {
        deleteData($conn, "PEMINJAMAN", (int)$_GET['deleteId']);
        header("Location: ../tables/Peminjaman.php");
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('".$e->getMessage()."'); window.location.href='../tables/Peminjaman.php';</script>";
    }
}

$data = getAllData($conn, "PEMINJAMAN");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Peminjaman</title>
    <link rel="stylesheet" href="../styles/tableStyle.css">
</head>
<body>
    <div id="container">
        <div id="add-back-container">
            <a href="../index.php" class="add-back-btn">Kembali</a>
            <a href="../forms/PeminjamanForm.php" class="add-back-btn">Tambah Data</a>
        </div>
        <table id="data-table">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>ID Member</th>
                    <th>ID Buku</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id_peminjaman']?></td>
                        <td><?= $value['tgl_pinjam']?></td>
                        <td><?= $value['tgl_kembali']?></td>
                        <td><?= $value['id_member']?></td>
                        <td><?= $value['id_buku']?></td>
                        <td>
                            <div class="opt-container">
                                <form action="../forms/PeminjamanForm.php" method="get">
                                    <input type="hidden" name="id" value="<?=$value['id_peminjaman']?>">
                                    <button class="opt-btn edit-btn" type="submit">Edit</button>
                                </form>
                                <form action="" method="get" class="deleteForm">
                                    <input type="hidden"  name="deleteId" value="<?=$value['id_peminjaman']?>">
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