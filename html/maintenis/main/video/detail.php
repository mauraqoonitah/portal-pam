<h2 class="art-postheader">Tambah Data Baru</h2>

<?php
$module   = 'video';
$moduledb = 'video';

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}
	echo widgetbackend('actionmenu',array(
											 '<img src="../images/back.png">Batal'		=> 'index.php?go='.$module,
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go='.$module.'&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go='.$module.'&do=ubah&id='.$id,
											));

?><fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_generator" action="" method="POST">
<div class="wide form">
		<div class="row">
		<label>Name</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['name']; ?>	</div>				
		<div class="row">
		<label>Youtube</label>
		<div style="display:block;width:80%;float:left"> <!-- <iframe width="250"  src="//www.youtube.com/embed/<?php echo $row['youtube'] ?>" frameborder="0" allowfullscreen></iframe> --> </div>				
		<div class="row">
		<label>Created</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['created']; ?>	</div>				
		<div class="row">
		<label>Ordering</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['ordering']; ?>	</div>

	<div class="row">
		<label>Published</label>
		<div style="display:block;width:80%;float:left"><?php echo YaTidak($row['published']); ?>	</div>
	
</div>
</form>
</fieldset>
