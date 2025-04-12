<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK201</title>
</head>
<body>
   <form action="" method="POST">
      Nama: 1 <input type="text" name="nama1"><br>
      Nama: 2 <input type="text" name="nama2"><br>
      Nama: 3 <input type="text" name="nama3"><br>
      <button type="submit" name="Urut">Urutkan</button><br><br>
   </form>

   <?php 
      if(isset($_POST["Urut"])) {
         $nama1 = $_POST["nama1"];
         $nama2 = $_POST["nama2"];
         $nama3 = $_POST["nama3"];
         urutkanNama($nama1, $nama2, $nama3);
      }
   ?>
</body>
</html>

<?php 
function urutkanNama($nama1, $nama2, $nama3){
   $arrayNama = [$nama1, $nama2, $nama3];
   sort($arrayNama);
   foreach ($arrayNama as $value) {
      echo $value . "<br>";
   }
}
?>