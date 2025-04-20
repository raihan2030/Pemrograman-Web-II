<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK302</title>
</head>
<body>
   <form action="" method="post">
      Tinggi: <input type="number" name="tinggi"><br>
      Alamat Gambar: <input type="text" name="linkGambar"><br>
      <button type="submit" name="cetak">Cetak</button><br><br>
   </form>

   <?php
      if(isset($_POST['cetak'])){
         $tinggi = $_POST['tinggi'];
         $link = $_POST['linkGambar'];
         $i = 1;
         while ($i <= $tinggi) {
            $k = 1;
            while($k <= $i-1){
               echo "<span style='display: inline-block; width: 30px;'></span>";
               $k++;
            }

            $j = $tinggi+1 - $i;
            while($j > 0){
               echo "<img src='$link' width='30px'>";
               $j--;
            }
            
            echo "<br>";
            $i++;
         }
      }
   ?>
</body>
</html>