<h2>Detail Data</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from template where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array(
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=template&do=list',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=template&do=ubah&id='.$id,
											));





?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Nama Template</label>
		<span><?php echo $row['nama_template']; ?></span>
		
	</div>
	<div class="row">
		<label>Default</label>
		<span><?php echo YaTidak($row['default_template']); ?></span>
	</div>
</div>
</form>
</fieldset>
