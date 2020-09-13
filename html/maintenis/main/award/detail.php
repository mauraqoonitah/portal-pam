<h2>Detail Data jasa_banner</h2>



<?php

if (isset($_GET['id'])){

	$id = $_GET['id'];	

	$dbedit = doquery("select * from jasa_banner where id='".$id."'");

	$row = $dbedit[0];

}

	$module = 'jasa_banner';

	echo widgetbackend('actionmenu',array(

											 '<img src="../images/back.png">Batal'		=> 'index.php?go='.$module,

											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go='.$module.'&do=hapus',

											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go='.$module.'&do=ubah&id='.$id,

											));











?>





<fieldset style="width: 100%">

<legend accesskey=I> Data Information </legend>

<form name="form_<?php echo $module; ?>" action="" method="POST">

<div class="wide form">

	<div class="row">

		<label>jasa banner Title</label>

		<span><?php echo $row['title']; ?></span>

	</div>

	<div class="row">

		<label>Image</label>

		<div style="display:block;width:80%;float:left"><img src="../images/jasa_banner/<?php echo $row['image']; ?>" /></div>

	</div>

	<div class="row">

		<label>Description</label>

		<div style="display:block;width:80%;float:left"><?php echo $row['description']; ?></div>

	</div>

	<div class="row">

		<label>URL Link</label>

		<div style="display:block;width:80%;float:left"><?php echo $row['url']; ?></div>

	</div>

	<div class="row">

		<label>Ordering</label>

		<span><?php echo $row['ordering']; ?></span>

	</div>

	<div class="row">

		<label>Published by</label>

		<span><?php echo YaTidak($row['published']); ?></span>

	</div>

</div>

</form>

</fieldset>

