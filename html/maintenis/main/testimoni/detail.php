<h2>Detail Data testimoni</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from testimoni where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=testimoni&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=testimoni&do=ubah&id='.$id,
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=testimoni',
											));





?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Name</label>
		<span><?php echo $row['name']; ?></span>
		
	</div>
	
	<div class="row">
		<label>E-mail</label>
		<span><?php echo $row['email']; ?></span>
	</div>
	
	<div class="row">
		<label>Testimoni</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['testimoni']; ?></div>
	</div>
	
	<div class="row">
		<label>Date Created</label>
		<span><?php echo $row['created']; ?></span>
	</div>

</div>
</form>
</fieldset>
