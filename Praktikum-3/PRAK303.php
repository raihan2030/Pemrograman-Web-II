<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK303</title>
</head>
<body>
   <form action="" method="post">
      Batas Bawah: <input type="number" name="btsBawah"><br>
      Batas Atas: <input type="number" name="btsAtas"><br>
      <button type="submit" name="cetak">Cetak</button><br><br>
   </form>

   <?php
   if(isset($_POST['cetak'])){
      $btsBawah = $_POST['btsBawah'];
      $btsAtas = $_POST['btsAtas'];

      do {
         if(($btsBawah + 7) % 5 == 0){
            echo "<img src='assets/star-images-9441.png' width='20px'/> ";
         }
         else{
            echo $btsBawah . ' ';
         }
         $btsBawah++;
      } while($btsBawah <= $btsAtas);
   }
   ?>
</body>
</html>