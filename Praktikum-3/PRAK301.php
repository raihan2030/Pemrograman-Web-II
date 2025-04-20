<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK301</title>
</head>
<body>
   <form action="" method="post">
      Jumlah peserta: <input type="number" name="peserta"><br>
      <button type="submit" name="cetak">Cetak</button><br>
   </form>

   <?php
      if(isset($_POST['cetak'])){
         $jumlah = $_POST['peserta'];
         $i = 1;
         while ($i <= $jumlah) {
            if($i % 2 == 0){
               echo "<h2 style='color: green;'>Peserta ke-$i</h2>";
            }
            else{
               echo "<h2 style='color: red;'>Peserta ke-$i</h2>";
            }
            $i++;
         }
      }
   ?>
</body>
</html>
