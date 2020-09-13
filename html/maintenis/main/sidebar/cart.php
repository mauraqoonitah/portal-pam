<?php

$jumlahqty = 0;
for ($i=0;$i<count($_SESSION['cart']['id_product']);$i++){
	$jumlahqty += $_SESSION['cart']['qty'][$i];
}
echo '<a href="'.$config['baseurl'].'modul/cart"><img src="'.$config['baseurl'] . 'images/cart.png" style="vertical-align: middle;"/> Shopping Cart: '.$jumlahqty.' items</a>';
if ($_GET['do']=='show'){
	$config['theme'] = '';
}

//print_r($_SESSION['cart']);
?>

