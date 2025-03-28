<?php
$hape_samsung = array(
   "hape1" => "Samsung Galaxy S22", 
   "hape2" => "Samsung Galaxy S22+", 
   "hape3" => "Samsung Galaxy A03", 
   "hape4" => "Samsung Galaxy Xcover 5"
);

echo "
   <table border='1px'>
      <tr style='background-color: red; height: 70px; font-size: 25px'>
         <th>Daftar Smartphone Samsung</th>
      </tr>
      <tr>
         <td> " .$hape_samsung['hape1']. " </td>
      </tr>
      <tr>
         <td> " .$hape_samsung['hape2']. " </td>
      </tr>
      <tr>
         <td> " .$hape_samsung['hape3']. " </td>
      </tr>
      <tr>
         <td> " .$hape_samsung['hape4']. " </td>
      </tr>
   </table>
";