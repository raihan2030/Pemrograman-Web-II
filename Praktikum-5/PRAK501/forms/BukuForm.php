<?php
require '../config/Koneksi.php';
require '../models/Model.php';

$currData = [];
if(isset($_GET['id'])){
    $query = $conn->prepare("SELECT * FROM BUKU WHERE id_buku = ?");
    $query->execute([(int)$_GET['id']]);
    $currData = $query->fetch(PDO::FETCH_ASSOC);;
}

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(trim($_POST['judulBuku']) == ""){
        $error = "Judul Buku tidak boleh kosong.";
    }
    else if(trim($_POST['penulis']) == ""){
        $error = "Penulis tidak boleh kosong.";
    }
    else if(trim($_POST['penerbit']) == ""){
        $error = "Penerbit tidak boleh kosong.";
    }
    else if((int)$_POST['tahunTerbit'] < 1500 || (int)$_POST['tahunTerbit'] > 2155){
        $error = "Tahun terbit di luar batas.";
    }
    else{
        $newData = [$_POST['judulBuku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahunTerbit']];
        if(isset($_GET['id'])){
            editData($conn, "BUKU", $newData, (int)$_GET['id']);
        }
        else{
            addData($conn, "BUKU", $newData);
        }
        header("Location: ../tables/Buku.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" href="../styles/formStyle.css">
</head>
<body>
    <div id="form-container">
        <h2><?php if(isset($_GET['id'])) {echo "Edit";} else {echo "Tambah";}?> Data Buku</h2>
        <span style="margin-top: 10px; color: red;"><?= $error ?></span>
        <form action="" method="post" id="add-form">
            <table id="input-table">
                <tr>
                    <td>Judul Buku:</td>
                    <td>
                        <input type="text" name="judulBuku" value="<?php if(isset($_GET['id'])) {echo $currData['judul_buku'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Penulis:</td>
                    <td>
                        <input type="text" name="penulis" value="<?php if(isset($_GET['id'])) {echo $currData['penulis'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Penerbit:</td>
                    <td>
                        <input type="text" name="penerbit" value="<?php if(isset($_GET['id'])) {echo $currData['penerbit'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Tahun Terbit:</td>
                    <td>
                        <input type="number" name="tahunTerbit" value="<?php if(isset($_GET['id'])) {echo (int)$currData['tahun_terbit'];}?>" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="btn-row">
                            <a class="back-add-btn" href="../tables/Buku.php">Kembali</a>
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