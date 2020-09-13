<h2>Detail Data event</h2>



<?php

if (isset($_GET['id'])){

	$id = $_GET['id'];	

	$dbedit = doquery("select * from event where id='".$id."'");

	$row = $dbedit[0];

}



	echo widgetbackend('actionmenu',array(

											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=event&do=hapus',

											 '<img src="../images/edit.png">Ubah'		=> 'index.php?go=event&do=ubah&id='.$id,

											));











?>





<fieldset style="width: 100%">

<legend accesskey=I> Data Information </legend>

<form name="form_<?php echo $module; ?>" action="" method="POST">

<div class="wide form">

	<div class="row">

		<label>News Title</label>

		<span><?php echo $row['title']; ?></span>

	</div>

	<div class="row">

		<label>Image</label>

		<div><img src="<?php echo $config['baseurl'].'images/news/'.$row['image']; ?>"/>		</div>

		

	</div>	

	<div class="row">

		<label>Intro Text</label>

		<div style="display:block;width:80%;float:left"><?php echo $row['intro_text']; ?></div>

	</div>

	<div class="row">

		<label>Full Text</label>

		<div style="display:block;width:80%;float:left"><?php echo $row['full_text']; ?></div>

	</div>

	<div class="row">

		<label>Created by</label>

		<span><?php echo $row['created_by']; ?></span>

	

	</div>

	<div class="row">

		<label>Date Created</label>

		<span><?php echo $row['created']; ?></span>

	</div>



</div>

</form>

</fieldset>

