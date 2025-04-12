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
         if(empty($_POST["nilai"])){
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
            if($pilihanHasil === "fahrenheit"){
               echo 9/5 * $nilai + 32 . " °F";
            }
            else if($pilihanHasil === "reamur"){
               echo 4/5 * $nilai . " °R";
            }
            else if($pilihanHasil === "kelvin"){
               echo $nilai + 273.15 . " K";
            }
            else {
               echo $nilai . " °C";
            }
         }
         else if($pilihanAsal === "fahrenheit"){
            if($pilihanHasil === "celcius"){
               echo ($nilai - 32) / 1.8 . " °C";
            }
            else if($pilihanHasil === "reamur"){
               echo ($nilai - 32) / 2.25 . " °R";
            }
            else if($pilihanHasil === "kelvin"){
               echo ($nilai + 459.67) / 1.8 . " K";
            }
            else{
               echo $nilai . " °F";
            }
         }
         else if($pilihanAsal === "reamur"){
            if($pilihanHasil === "celcius"){
               echo $nilai * 1.25 . " °C";
            }
            else if($pilihanHasil === "fahrenheit"){
               echo $nilai * 2.25 + 32 . " °F";
            }
            else if($pilihanHasil === "kelvin"){
               echo $nilai * 1.25 + 273.15 . " K";
            }
            else{
               echo $nilai . " °R";
            }
         }
         else{
            if($pilihanHasil === "celcius"){
               echo $nilai - 273.15 . " °C";
            }
            else if($pilihanHasil === "fahrenheit"){
               echo $nilai * 1.8 - 459.67 . " °F";
            }
            else if($pilihanHasil === "reamur"){
               echo ($nilai - 273.15) * 0.8 . " °R";
            }
            else{
               echo $nilai . " K";
            }
         }
      }

      function isFloat($num){
         return is_numeric($num) && strpos($num, ".") !== false;
      }

   ?>
   </h2>
</body>
</html>