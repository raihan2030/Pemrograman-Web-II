<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK202</title>
   <style>
      .error {
         color: red;
      }
   </style>
</head>
<body>
   <?php 
      $nama_error = "";
      $nim_error = "";
      $jenis_kelamin_error = "";

      if(isset($_POST["submit"])){
         if(empty($_POST["nama"])){
            $nama_error = "nama tidak boleh kosong";
         }
         if(empty($_POST["nim"])){
            $nim_error = "nim tidak boleh kosong";
         }
         if(empty($_POST["gender"])){
            $jenis_kelamin_error = "jenis kelamin tidak boleh kosong";
         }
      }
   ?>

   <form action="" method="POST">
      Nama: <input type="text" name="nama"><span class="error">* <?php if($nama_error) echo $nama_error; ?></span><br>
      NIM: <input type="text" name="nim"><span class="error">* <?php if($nim_error) echo $nim_error; ?></span><br>
      Jenis Kelamin: <span class="error">* <?php if($jenis_kelamin_error) echo $jenis_kelamin_error; ?></span><br>
      <input type="radio" name="gender" value="Laki-laki">Laki-laki <br>
      <input type="radio" name="gender" value="Perempuan">Perempuan <br>
      <button type="submit" name="submit">Submit</button><br><br>
      
      <?php 
         if(!empty($_POST["nama"]) && !empty($_POST["nim"]) && !empty($_POST["gender"])){
            echo $_POST["nama"] . "<br>";
            echo $_POST["nim"] . "<br>";
            echo $_POST["gender"];
         } 
      ?>
   </form>

</body>
</html>