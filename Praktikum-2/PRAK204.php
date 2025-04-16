<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK204</title>
</head>
<body>
   <form action="" method="post">
      Nilai: <input type="text" name="nilai"><br>
      <button type="submit" name="konversi">Konversi</button><br><br>
   </form>

   <h2>
   <?php
      if(isset($_POST["konversi"])){
         if(trim($_POST["nilai"]) == ""){
            echo "Input nilai masih kosong!";
            exit();
         }
         else if(!is_numeric($_POST["nilai"])){
            echo "Nilai tidak valid!";
            exit();
         }
         else{
            echo "Hasil: ";
         }

         $nilai = (int)$_POST["nilai"];
         if($nilai === 0){
            echo "Nol";
         }
         else if($nilai > 0 && $nilai < 10){
            echo "Satuan";
         }
         else if($nilai > 10 && $nilai < 20){
            echo "Belasan";
         }
         else if($nilai === 10 || ($nilai > 19 && $nilai < 100)){
            echo "Puluhan";
         }
         else if($nilai > 99 && $nilai < 1000){
            echo "Ratusan";
         }
         else{
            echo "Anda Menginput Melebihi Limit Bilangan";
         }
      }
   ?>
   </h2>
</body>
</html>