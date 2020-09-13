<h2 class="art-postheader">Detail Data</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from menu where id='".$id."'");
	$row = $dbedit[0];
}

	$module = 'menu';
	$tipe   = $_GET['tipe'];
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/back.png">Batal'		=> 'index.php?go='.$module.'&tipe='.$tipe,
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go='.$module.'&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go='.$module.'&do=ubah&id='.$id.'&tipe='.$tipe,
											));
?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Tipe Menu</label>
		<span><?php echo $row['menutype']; ?></span>
		
	</div>
	<div class="row">
		<label>Judul</label>
		<span><?php echo $row['title']; ?></span>
	</div>
	<div class="row">
		<label>Alias</label>
		<span><?php echo $row['alias']; ?></span>
	
	</div>
	<div class="row">
		<label>Link</label>
		<span><?php echo $row['link']; ?></span>
	</div>

</div>
</form>
</fieldset>
