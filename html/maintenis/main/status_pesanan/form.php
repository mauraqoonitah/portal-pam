<?php
?>

<?php

$module   = 'status_pesanan';
$moduledb = 'ec_order_status';


if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array('<img src="../images/back.png">Batal'=> 'index.php?go='.$module));

?>


<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_generator" action="" method="POST">
<div class="wide form">
							
			<div class="row">
			<label>Nama Status</label>

			<input type="text" name="nama_status" id="nama_status" value="<?php echo $row['nama_status']; ?>"/>
		
				</div>	
										
				
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan" class="art-button" />
	</div>	
</div>

</form>
</fieldset>