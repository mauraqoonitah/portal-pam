<?php

	$attributenya 	= $param['field'];
	$value			= $param['value'];
	$rows		  	= $param['rows'];
	if (strlen($rows)==0){
		$rows = "12";
	}
	$cols		  	= $param['cols'];
	if (strlen($cols)==0){
		$cols = "80";
	}
	$width		  	= $param['width'];	
	if (strlen($width)==0){
		$width = "80%";
	}
	$id_attribute 	= str_replace(' ','_',$attributenya);
	$assets 		= $config['baseurl'] . 'res/xheditor';
	
	registerJS($assets . '/xheditor-1.1.12-en.min.js');

?>
		<script language="javascript">
		$(pageInit<?php echo $id_attribute; ?>);
		
		function pageInit<?php echo $id_attribute; ?>()
		{			
			$('#<?php echo $id_attribute; ?>').xheditor({upLinkUrl:"<?php echo $config['baseurl']?>res/xheditor/upload.php",upLinkExt:"zip,rar,txt",upImgUrl:"<?php echo $config['baseurl']?>res/xheditor/upload.php",upImgExt:"jpg,jpeg,gif,png",upFlashUrl:"<?php echo $config['baseurl']?>/res/xheditor/upload.php",upFlashExt:"swf",upMediaUrl:"<?php echo $config['baseurl']?>res/xheditor/upload.php",upMediaExt:"wmv,avi,wma,mp3,mid"});
		}

		</script>
<textarea id="<?php echo $id_attribute; ?>" name="<?php echo $attributenya; ?>" rows="<?php echo $rows; ?>" cols="<?php echo $cols; ?>" style="width: <?php echo $width; ?>">
<?php echo $value; ?>
</textarea>





