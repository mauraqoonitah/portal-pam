<?php
	$config['theme'] = '';
	$id_product  = post('id_product');
	$id_address  = post('id_address');
	$qty		 = post('qty');
	$remark		 = post('remark');
	$resultcart  = mysql_query("INSERT INTO ec_cart (id_user, id_product, qty,id_address,remark) VALUES('$_SESSION[userid]','$id_product','$qty','$id_address','$remark') ON DUPLICATE KEY UPDATE qty=qty+'$qty'");
	/*
	$post_cart   = array();
	$post_cart['id_product'] = $id_product;
	$post_cart['id_user'] = $_SESSION['userid'];
	$post_cart['qty'] = $qty;
	*/
	
	/*
	function read_price($id_product){
		$data = doGetData('ec_product','price','id='.q($id_product));
		return $data['price']; 
	}
	function read_nama($id_product){
		$data = doGetData('ec_product','nama_product','id='.q($id_product));
		return $data['nama_product'];
	}
	function read_sum_qty($id_product){
		$data = doGetData('ec_cart','sum(qty) as qty','id_product='.q($id_product));
		return $data['qty'];
	}
	*/
	
	/*
	$querycart = doquery("select * from ec_cart where id_user='$_SESSION[userid]'");
	$querycart1 = doquery("select * from ec_cart where id_user='$_SESSION[userid]' group by id_product");
	
	$subtotal = '0';
	foreach($querycart as $datacart){
		$hargaval = read_price($datacart['id_product'])*$datacart['qty'];
		$subtotal+=$hargaval;
	}
	$data = array();
	foreach($querycart1 as $datacart1){
		$data[] = array(
			'qty' => $qty,
			'subtotal' => number_format($subtotal,0,',','.'),
			'price_all' => number_format(read_sum_qty($datacart1['id_product'])*read_price($datacart1['id_product']),0,',','.'),
			'nama_product' => read_nama($datacart1['id_product']),
			'qty_product' => read_sum_qty($datacart1['id_product']),
			'price_product' =>  number_format(read_price($datacart1['id_product']),0,',','.')
		);
	}
	header('Content-Type: application/json');
	echo json_encode($data);
	*/
?>