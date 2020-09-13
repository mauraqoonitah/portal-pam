<h2>Detail Halaman Web</h2>

<?php
if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from content where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array(
											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=content&do=hapus',
											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=content&do=ubah&id='.$id.'&tipe='.$tipe,
											));





?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<div class="row">
		<label>Content Title</label>
		<span><?php echo $row['title']; ?></span>
		
	</div>
	<div class="row">
		<label>Content Title Alias</label>
		<span><?php echo $row['title_alias']; ?></span>
	</div>
	<div class="row">
		<label>Images</label>
		<span><img src="<?php echo '../images/featured/'. $row['images']; ?>" alt="" width="42" height="42" /></span>
	</div>	
	<div class="row">
		<label>Intro Text Content</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['intro_text']; ?></div>
	</div>
	<div class="row">
		<label>Full Text Content</label>
		<div style="display:block;width:80%;float:left"><?php echo $row['full_text']; ?></div>
	</div>
	<div class="row">
		<label>Date Created</label>
		<span><?php echo $row['created']; ?></span>
	</div>

</div>
</form>
</fieldset>
