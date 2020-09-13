<?php

	echo widgetbackend('actionmenu',array(

											 '<img src="../images/delete.png">Hapus'	=> 'index.php?go=messenger&do=hapus',
											 '<img src="../images/new.png">Tambah'		=> 'index.php?go=messenger&do=tambah',
											 '<img src="../images/list.png">Batal'	=> 'index.php?go=messenger',
											));





if (isset($_GET['id'])){

	$id = $_GET['id'];	

	$dbedit = doquery("select * from messenger where id='".$id."'");

	$row = $dbedit[0];

}



?>





<fieldset style="width: 100%">

<legend accesskey=I>Messenger User Data Information </legend>

<form name="form1" action="" method="POST">

<div class="wide form">
	
	<div class="row">
		<label>User Yahoo</label>
		<input type="text" name="ymuser" id="ymuser" value="<?php echo $row['ymuser']; ?>"/>
	</div>
	<div class="row">
		<label>User Name</label>
		<input type="text" name="nmuser" id="nmuser" value="<?php echo $row['nmuser']; ?>"/>
	</div>
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" id="ordering" value="<?php echo $row['ordering']; ?>"/>
	</div>
	
	<div class="row">
		 <label for="published">Published</label>
  			<select name="published" id="published">
    		<option value="1" 
			<?php
			if ($row['published']=='1') echo ' selected="selected"';  
			?>
			>Yes</option>
    		<option value="0"
			<?php
			if ($row['published']=='0') echo ' selected="selected"';  
			?>
			>No</option>
  			</select>
	</div>	
	
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan"/>
	</div>	
</div>

</form>

</fieldset>

