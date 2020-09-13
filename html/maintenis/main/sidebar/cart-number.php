<?php

$jumlahqty = 0;
for ($i=0;$i<count($_SESSION['cart']['id_product']);$i++){
	$jumlahqty += $_SESSION['cart']['qty'][$i];
}
?>
<img style="vertical-align: middle;" src="<?php echo $config['baseurl'];?>images/cart.png">
Shopping Cart: 
<?php
echo '<a href="'.$config['baseurl'].'modul/cart">'.$jumlahqty.' items</a>';
if ($_GET['do']=='show'){
	$config['theme'] = '';
}
 
//print_r($_SESSION['cart']);
?>