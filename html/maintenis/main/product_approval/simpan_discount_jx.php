<?php

$config['theme'] = '';
$discount_craftynesia = post('discount_craftynesia');
$id = post('id');
//echo $id;
//echo $discount_craftynesia;
$sql = 'update ec_product set discount_craftynesia='.q($discount_craftynesia).' where id='.q($id);
//echo $sql;
$hasil_simpan = doexec($sql);

if ($hasil_simpan){
	echo 'sukses';
} else {
	echo 'gagal';
}
?>