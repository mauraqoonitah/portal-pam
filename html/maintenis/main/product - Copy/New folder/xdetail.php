<h2>Detail Data Product</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ec_product where id='".$id."'");
	$row = $dbedit[0];
}
	global $config; 
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=product&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=product&do=ubah&id='.$id,
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=product',
											));





?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Product Code</label>
		<span><?php echo $row['kode_product']; ?></span>
		
	</div>
	
	<div class="row">
		<label>Product Name</label>
		<span><?php echo $row['nama_product']; ?></span>
	</div>
	
	<div class="row">
		<label>Product Image</label>
		<div><img src="<?php echo $config['baseurl'] . $row['img']; ?>" alt="" /></div>
	</div>
	
	<div class="row">
		<label>Product Icon</label>
		<span><?php echo $row['img_icon']; ?></span>
	</div>
	
	<div class="row">
		<label>Product Price</label>
		<span><?php echo $row['price']; ?></span>
	</div>
	
	<div class="row">
		<label>Short Desc.</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['short_desc']; ?></div>
	</div>
	
	<div class="row">
		<label>Long Desc.</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['long_desc']; ?></div>
	</div>
	
	<div class="row">
		<label>Product Weight</label>
		<span><?php echo $row['weight'].'gr'; ?></span>
	</div>
	
	<div class="row">
		<label>Product L x W x H</label>
		<span><?php echo $row['length'].'mm x '.$row['width'].'mm x '.$row['height'].'mm'; ?></span>
	</div>
	
	
	<div class="row">
		<label>Date Created</label>
		<span><?php echo $row['created']; ?></span>
	</div>

</div>
</form>
</fieldset>
