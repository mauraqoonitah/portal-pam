<h2>Detail Data Produk</h2>

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
	<!-- <div class="row">
		<label>Product Code</label>
		<span><?php echo $row['kode_product']; ?></span>
		
	</div> -->
	
	<div class="row">
		<label>Judul Image</label>
		<span><?php echo $row['nama_product']; ?></span>
	</div>
	
<!--	<div class="row">
		<label>Product Image</label>
		<div><img src="<?php echo $config['baseurl'].'/images/products/'.$row['img']; ?>" alt="" /></div>
	</div> -->

	<div class="row">
		<label>Image</label>
		<div><img src="<?php echo $config['baseurl'].'images/products/'.$row['img_icon']; ?>"/>		</div>
		
	</div>
	
<!--	<div class="row">
		<label>Brand</label>
		<span><?php echo $row['brand']; ?></span>
	</div>
	
	<div class="row">
		<label>Size</label>
		<span><?php echo $row['ukuran']; ?></span>
	</div> 	
	
	<div class="row">
		<label>Logo</label>
		<div><img src="<?php echo $config['baseurl'].'images/logobrand/'.$row['logobrand']; ?>"/>		</div> -->
	
	<div class="row">
		<label>Featured</label>
		<span><?php 
				if ($row['featured']=="1")
				{
				echo "<b>Tampil di Featured</b>" ;
				}
				else
				{
				echo "<b>Tidak Ditampilkan di Featured</b>";					
				}
				?>
				</span>
	</div>
	
	<div class="row">
		<label>Published</label>
		<span><?php 
				if ($row['published']=="1")
				{
				echo "<b>Tampilkan</b>" ;
				}
				else
				{
				echo "<b>Sembunyikan</b>";					
				}
				?>
				</span>
	</div>
	
	<!--<div class="row">
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
	</div> -->

</div>
</form>
</fieldset>
