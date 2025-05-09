<?php
require '../config/Koneksi.php';
require '../models/Model.php';

if(isset($_GET['deleteId'])){
    try {
        deleteData($conn, "MEMBER", (int)$_GET['deleteId']);
        header("Location: ../tables/Member.php");
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('".$e->getMessage()."'); window.location.href='../tables/Member.php';</script>";
    }
}

$data = getAllData($conn, "MEMBER");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Member</title>
    <link rel="stylesheet" href="../styles/tableStyle.css">
</head>
<body>
    <div id="container">
        <div id="add-back-container">
            <a href="../index.php" class="add-back-btn">Kembali</a>
            <a href="../forms/MemberForm.php" class="add-back-btn">Tambah Data</a>
        </div>
        <table id="data-table">
            <thead>
                <tr>
                    <th>ID Member</th>
                    <th>Nama Member</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id_member']?></td>
                        <td><?= $value['nama_member']?></td>
                        <td><?= $value['nomor_member']?></td>
                        <td><?= $value['alamat']?></td>
                        <td><?= $value['tgl_mendaftar']?></td>
                        <td><?= $value['tgl_terakhir_bayar']?></td>
                        <td>
                            <div class="opt-container">
                                <form action="../forms/MemberForm.php" method="get">
                                    <input type="hidden" name="id" value="<?=$value['id_member']?>">
                                    <button class="opt-btn edit-btn" type="submit">Edit</button>
                                </form>
                                <form action="" method="get" class="deleteForm">
                                    <input type="hidden"  name="deleteId" value="<?=$value['id_member']?>">
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