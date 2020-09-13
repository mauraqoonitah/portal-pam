<?php
$config['theme'] = '';
$id_product = $_POST['kode'];
$deletecart = doexec("delete from ec_cart where id_product='$id_product' and id_user='$_SESSION[userid]'");

?>