<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK203</title>
</head>
<body>
   <form action="" method="POST">
      Nilai: <input type="text" name="nilai"><br>
      Dari: <br>
      <input type="radio" name="asal" value="celcius">Celcius <br>
      <input type="radio" name="asal" value="fahrenheit">Fahrenheit <br>
      <input type="radio" name="asal" value="reamur">Reamur <br>
      <input type="radio" name="asal" value="kelvin">Kelvin <br>
      Ke: <br>
      <input type="radio" name="hasil" value="celcius">Celcius <br>
      <input type="radio" name="hasil" value="fahrenheit">Fahrenheit <br>
      <input type="radio" name="hasil" value="reamur">Reamur <br>
      <input type="radio" name="hasil" value="kelvin">Kelvin <br>
      <button type="submit" name="konversi">Konversi</button><br><br>
   </form>

   <h2>
   <?php 
      if(isset($_POST["konversi"])){
         $nilai = 0.0;
         if(trim($_POST["nilai"]) === ""){
            echo "Input nilai masih kosong!";
            exit();
         }
         else if(is_numeric($_POST["nilai"])){
            $nilai = (double)$_POST["nilai"];
         }
         else if(isFloat($_POST["nilai"])){
            $nilai = (double)$_POST["nilai"];
         }
         else{
            echo "Nilai tidak valid!";
            exit();
         }

         $pilihanAsal = "";
         $pilihanHasil = "";
         if(!isset($_POST["asal"]) || !isset($_POST["hasil"])){
            echo "Terdapat pilihan yang kosong!";
            exit();
         }
         else{
            $pilihanAsal = $_POST["asal"];
            $pilihanHasil = $_POST["hasil"];
            echo "Hasil Konversi: ";
         }

         if($pilihanAsal === "celcius"){
            $nilai = $nilai;
         }
         else if($pilihanAsal === "fahrenheit"){
            $nilai = ($nilai - 32) / 1.8;
         }
         else if($pilihanAsal === "reamur"){
            $nilai = $nilai * 1.25;            
         }
         else{
            $nilai = $nilai - 273.15;            
         }

         if($pilihanHasil === "celcius"){
            echo $nilai . " °C";
         }
         else if($pilihanHasil === "fahrenheit"){
            echo $nilai * 1.8 + 32 . " °F";
         }
         else if($pilihanHasil === "reamur"){
            echo $nilai * 0.8 . " °R";
         }
         else{
            echo $nilai + 273.15 . " K";
         }
      }

      function isFloat($num){
         return is_numeric($num) && strpos($num, ".") !== false;
      }

   ?>
   </h2>
</body>
</html>