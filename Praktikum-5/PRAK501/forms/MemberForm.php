<?php
date_default_timezone_set('Asia/Makassar');
require '../config/Koneksi.php';
require '../models/Model.php';

$currData = [];
if(isset($_GET['id'])){
    $query = $conn->prepare("SELECT * FROM MEMBER WHERE id_member = ?");
    $query->execute([(int)$_GET['id']]);
    $currData = $query->fetch(PDO::FETCH_ASSOC);;
}

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(trim($_POST['namaMember']) == ""){
        $error = "Nama Member tidak boleh kosong.";
    }
    else if(trim($_POST['nomorMember']) == ""){
        $error = "Nomor Member tidak boleh kosong.";
    }
    else if(trim($_POST['alamat']) == ""){
        $error = "Alamat tidak boleh kosong.";
    }
    else{
        $stringDatetime = isset($_GET['id']) ? $currData['tgl_mendaftar'] : (new DateTime())->format('Y-m-d H:i:s');
        $newData = [$_POST['namaMember'], $_POST['nomorMember'], $_POST['alamat'], $stringDatetime, $_POST['tglTerakhirBayar']];
        if(isset($_GET['id'])){
            editData($conn, "MEMBER", $newData, (int)$_GET['id']);
        }
        else{
            addData($conn, "MEMBER", $newData);
        }
        header("Location: ../tables/Member.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="stylesheet" href="../styles/formStyle.css">
</head>
<body>
    <div id="form-container">
        <h2><?php if(isset($_GET['id'])) {echo "Edit";} else {echo "Tambah";}?> Data Member</h2>
        <span style="margin-top: 10px; color: red;"><?= $error ?></span>
        <form action="" method="post" id="add-form">
            <table id="input-table">
                <tr>
                    <td>Nama Member:</td>
                    <td>
                        <input type="text" name="namaMember" value="<?php if(isset($_GET['id'])) {echo $currData['nama_member'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Member:</td>
                    <td>
                        <input type="text" name="nomorMember" value="<?php if(isset($_GET['id'])) {echo $currData['nomor_member'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td>
                        <input type="text" name="alamat" value="<?php if(isset($_GET['id'])) {echo $currData['alamat'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Terakhir Bayar:</td>
                    <td>
                        <input type="date" name="tglTerakhirBayar" value="<?php if(isset($_GET['id'])) {echo $currData['tgl_terakhir_bayar'];} else {echo date('Y-m-d');}?>" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="btn-row">
                            <a class="back-add-btn" href="../tables/Member.php">Kembali</a>
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