<h2>Detail Data Messenger</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from messenger where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=messenger&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=messenger&do=ubah&id='.$id,
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=messenger',
											));





?>


<fieldset style="width: 100%">
<legend accesskey=I> Messenger Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>User Yahoo</label>
		<span><?php echo $row['ymuser']; ?></span>
	</div>
	<div class="row">
		<label>User Name</label>
		<span><?php echo $row['nmuser']; ?></span>
	</div>
	<div class="row">
		<label>Published</label>
		<span><?php echo $row['published']; ?></span>
	</div>
	<div class="row">
		<label>Date Created</label>
		<span><?php echo $row['created']; ?></span>
	</div>
</div>
</form>
</fieldset>
