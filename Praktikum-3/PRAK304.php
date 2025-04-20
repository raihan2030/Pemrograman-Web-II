<?php
session_start();

if(isset($_POST['cetak'])){
   $_SESSION['bintang'] = (int)$_POST['bintang'];
   $_SESSION['sudahDicetak'] = true;
}
if(isset($_POST['tambah'])){
   $_SESSION['bintang']++;
}
if(isset($_POST['kurang'])){
   $_SESSION['bintang']--;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK304</title>
</head>
<body>
   <form action="" method="post">
      Jumlah Bintang: <input type="number" name="bintang"><br>
      <button type="submit" name="cetak">Cetak</button><br>
   </form>

   <br>
   <?php if(isset($_SESSION['sudahDicetak'])): ?>
      Jumlah Bintang: <?= $_SESSION['bintang']?><br><br>
      <?php 
      for ($i=0; $i < $_SESSION['bintang']; $i++) { 
         echo "<img src='assets/star-images-9441.png' width='50px'/>";
      }
      ?>
      <form action="" method="post">
         <button type='submit' name='tambah'>Tambah</button>
         <button type='submit' name='kurang'>Kurang</button>
      </form>
   <?php endif ?>
</body>
</html>