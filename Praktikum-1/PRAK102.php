<?php
$panjang = 8.9;
$lebar = 14.7;
$tinggi = 5.4;

$luasAlas = $panjang * $lebar;

$volume = ($luasAlas * $tinggi)/3;

echo number_format($volume,3,",") . " m3";