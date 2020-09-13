<?php
include "../inc/craftynesia.inc.php";
$dari = post('origin');
$tujuan = post('country');
$berat = post('berat');
$tinggi = '';
$lebar = '';
$panjang = '';
echo ambil_ems($dari,$tujuan,$berat,$tinggi,$lebar,$panjang);