<h2 class="art-postheader">Detail Data</h2>

<?php

	$module = 'kategori_produk';
	$moduledb = 'ec_category';
	
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array(
	'<img src="../images/back.png">Batal'	=> 'index.php?go='.$module.'&tipe='.$tipe,
	'<img src="../images/delete.png">Hapus'	=> 'index.php?go='.$module.'&do=hapus',
	'<img src="../images/edit.png">Ubah'	=> 'index.php?go='.$module.'&do=ubah&id='.$id.'&tipe='.$tipe,
										));
?>

<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Nama Kategori</label>
		<span><?php echo $row['nama_category']; ?></span>
		
	</div>
	<div class="row">
		<label>Nama Kategori Alias</label>
		<span><?php echo $row['nama_category_alias']; ?></span>
	</div>

</div>
</form>
</fieldset>
