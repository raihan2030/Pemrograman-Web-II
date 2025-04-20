<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PRAK305</title>
</head>
<body>
   <form action="" method="post">
      <input type="text" name="kata">
      <button type="submit" name="submit">submit</button><br><br>
   </form>

   <?php
   if(isset($_POST['submit'])){
      $kata = $_POST['kata'];

      for($i=0; $i<strlen($kata); $i++){
         for ($j=0; $j < strlen($kata); $j++) { 
            if($j == 0) echo strtoupper($kata[$i]);
            else echo strtolower($kata[$i]);
         }
      }
   }
   ?>
</body>
</html>