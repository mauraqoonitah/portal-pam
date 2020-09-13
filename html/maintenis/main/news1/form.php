<?php

	echo widgetbackend('actionmenu',array(
											 '<img src="../images/back.png">Batal'		=> 'index.php?go=news',
											 //'<img src="../images/delete.png">Hapus'	=> 'index.php?go=news&do=hapus',
											 //'<img src="../images/new.png">Tambah'		=> 'index.php?go=news&do=tambah',
											));

if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from news where id='".$id."'");
	$row = $dbedit[0];
}
?>

<script language="javascript">
$(function(){
	$('#title').keyup(function(){
		var aliasnya = $(this).val();
		aliasnya = aliasnya.replace(/\s/g,'-').replace(/[^a-zA-Z 0-9\-]+/g,'-').toLowerCase();
		$('#title_alias').val(aliasnya);
	});
});
</script>
<fieldset style="width: 100%;">

<legend accesskey=I> Data Information </legend>

<form name="form1" action="" method="POST">

<div class="wide form">
	<div class="row">
		<label>News Title</label>
		<input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" style="width: 400px;"/>
	</div>
	<div class="row">
		<label>News Title Alias</label>
		<input type="text" name="title_alias" id="title_alias" value="<?php echo $row['title_alias']; ?>" style="width: 400px;"/>
	</div>
	<div class="row">
		<label>Intro Text</label>
		<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'intro_text',
												'value' => $row['intro_text'],
												'rows'	=> '20',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
	</div>
	<div class="row">
		<label>Full Text</label>
		<?php 
		echo widgetbackend('xheditor',array( 	'field' => 'full_text',
												'value' => $row['full_text'],
												'rows'	=> '20',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
		?>
	</div>
	
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/>
	</div>

	
	<div class="row">
		<label>Tampilkan di depan</label>
		<?php echo widgetbackend('inputselect', array(	'field'	=> 'featured',
														'option'=> array('0'=>'Tidak','1'=>'Ya'),
														'value'	=> $row['featured'],
														)); ?>
	</div>

	<div class="row">
		 <label for="published">Published</label>
		<?php echo widgetbackend('inputselect', array(	'field'	=> 'published',
														'option'=> array('1'=>'Ya','0'=>'Tidak'),
														'value'	=> $row['published'],
														)); ?>

	</div>
	
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan"/>
	</div>	
</div>

</form>

</fieldset>

