<?php
$hape_samsung = array(
   "Samsung Galaxy S22", 
   "Samsung Galaxy S22+", 
   "Samsung Galaxy A03", 
   "Samsung Galaxy Xcover 5"
);
echo "
<table border='1px'>
   <tr><th>Daftar Smartphone Samsung</th></tr>";
   foreach ($hape_samsung as $value) {
      echo "<tr><td>$value</td></tr>";
   }
echo "
</table>
";