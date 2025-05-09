<?php
date_default_timezone_set('Asia/Makassar');
require '../config/Koneksi.php';
require '../models/Model.php';

$currData = [];
if(isset($_GET['id'])){
    $query = $conn->prepare("SELECT * FROM PEMINJAMAN WHERE id_peminjaman = ?");
    $query->execute([(int)$_GET['id']]);
    $currData = $query->fetch(PDO::FETCH_ASSOC);;
}

$dataBuku = getAllData($conn, "BUKU");
$dataMember = getAllData($conn, "MEMBER");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newData = [$_POST['tglPinjam'], $_POST['tglKembali'],(int) $_POST['idMember'], (int)$_POST['idBuku']];
    if(isset($_GET['id'])){
        editData($conn, "PEMINJAMAN", $newData, (int)$_GET['id']);
    }
    else{
        addData($conn, "PEMINJAMAN", $newData);
    }
    header("Location: ../tables/Peminjaman.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Peminjaman</title>
    <link rel="stylesheet" href="../styles/formStyle.css">
    <style>
        #idMember, #idBuku {
            width: 140px;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <h2><?php if(isset($_GET['id'])) {echo "Edit";} else {echo "Tambah";}?> Data Peminjaman</h2>
        <form action="" method="post" id="add-form">
            <table id="input-table">
                <tr>
                    <td>Tanggal Pinjam:</td>
                    <td>
                        <input type="date" name="tglPinjam" value="<?php if(isset($_GET['id'])) {echo $currData['tgl_pinjam'];} else {echo date('Y-m-d');}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Kembali:</td>
                    <td>
                        <input type="date" name="tglKembali" value="<?php if(isset($_GET['id'])) {echo $currData['tgl_kembali'];} else {echo date('Y-m-d');}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>ID Member:</td>
                    <td>
                        <select name="idMember" id="idMember" required>
                            <?php if(isset($_GET['id'])): ?>
                                <?php foreach($dataMember as $key => $value): ?>
                                    <?php if($value['id_member'] == $currData['id_member']): ?>
                                        <option value="<?= $value['id_member'] ?>" selected><?= $value['id_member'] ?></option>
                                    <?php else: ?>
                                        <option value="<?= $value['id_member'] ?>"><?= $value['id_member'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option value="" disabled selected>--Pilih ID Member--</option>
                                <?php foreach($dataMember as $key => $value): ?>
                                    <option value="<?= $value['id_member'] ?>"><?= $value['id_member'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ID Buku:</td>
                    <td>
                        <select name="idBuku" id="idBuku" required>
                            <?php if(isset($_GET['id'])): ?>
                                <?php foreach($dataBuku as $key => $value): ?>
                                    <?php if($value['id_buku'] == $currData['id_buku']): ?>
                                        <option value="<?= $value['id_buku'] ?>" selected><?= $value['id_buku'] ?></option>
                                    <?php else: ?>
                                        <option value="<?= $value['id_buku'] ?>"><?= $value['id_buku'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <?php else: ?>
                                <option value="" disabled selected>--Pilih ID Buku--</option>
                                <?php foreach($dataBuku as $key => $value): ?>
                                    <option value="<?= $value['id_buku'] ?>"><?= $value['id_buku'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="btn-row">
                            <a class="back-add-btn" href="../tables/Peminjaman.php">Kembali</a>
                            <button class="back-add-btn" id="add-btn" type="submit">
                                <?php if(isset($_GET['id'])) { echo "Edit"; } else { echo "Tambah"; } ?>
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>