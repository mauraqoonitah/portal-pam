<?php

	registerJS($config['basepath'].'res/jquery.livequery.js');
	//delete isi folder temp yang isi filenya lebih dari 7 hari
    $files_hapus = glob($config['basepath'].'temp/*');
    foreach($files_hapus as $file) {
        if(is_file($file)
        && time() - filemtime($file) >= 7*24*60*60) { // 2 days
            unlink($file);
        }
    }
	
if ($_GET['status']=='hapus_temp'){

	$config['theme'] = '';
	$namafile = $_POST['namafilehapus'];
	$namafilehapus = $config['basepath'].'temp/'.$namafile;
	$namafilehapus_windows = trim(str_replace('/','\\',$namafilehapus));

	$status_delete = FALSE;
	
	@$status_delete = unlink($namafilehapus);
		
	if (!$status_delete) {
		@$status_delete = unlink($namafilehapus_windows);
	}
	
	if ($status_delete){
		echo 'berhasil hapus';
	}	
	
	
} else 
if ($_GET['status']=='upload'){
//proses upload
$config['theme'] = '';
$f=$_GET['f'];
foreach ($_FILES["upload".$f]["error"] as $key => $error) {

    if ($error == UPLOAD_ERR_OK) {
        $name = $_FILES["upload".$f]["name"][$key];				
		$actual_name 	= pathinfo($name,PATHINFO_FILENAME);
		$original_name 	= $actual_name;
		$extension 		= pathinfo($name, PATHINFO_EXTENSION);
		$namafile 		= $config['basepath'] . 'temp/' . $name;
		$i = 1;
		while(file_exists($config['basepath'].'attachment/'.$actual_name.".".$extension) || file_exists($config['basepath'].'temp/'.$actual_name.".".$extension))
		{           
		    $actual_name	= (string)$original_name.$i;
			$name 			= $actual_name.".".$extension;
			$namafile 		= $config['basepath'] . 'temp/' . $name;
		    $i++;
		}
		//echo $namafile;
        //move_uploaded_file( $_FILES["upload".$f]["tmp_name"][$key], $namafile);
        //die();
		if (move_uploaded_file( $_FILES["upload".$f]["tmp_name"][$key], $namafile)){			
			echo $name;
		} else echo 'gagal';
    }
}

} else {
//tampilkan form	

		$default_value 	= $param['value'];
		//echo 'zz'.$default_value;		
		$field 			= $param['field'];
		$fieldid 			= $param['id'];
        if ($fieldid=='') {
            $fieldid		= str_replace(' ','_',$field);
            $fieldid		= str_replace('[','',$fieldid);
            $fieldid		= str_replace(']','',$fieldid);
        }
		$path 			= $config['basepath'] . $param['path'];
		$temp_path		= $config['basepath'] . 'temp';
		$disabled		= $param['disabled'];
		
	?>
	<script language="javascript">
	jQuery(function(){	
	
		var inputtag = '<div class="input-group"><span class="input-group-btn"><span class="btn btn-file">Browse <input type="file" name="<?php echo $field; ?>" id="upload<?php echo $fieldid; ?>" multiple size="1" <?php echo $disabled; ?> /></span></span><input type="text" class="form-control" readonly></div>';
		jQuery( document ).ready(function(){
			jQuery('#file_progress_<?php echo $fieldid;?>').hide();
		});
		jQuery(document).on('change','#upload<?php echo $fieldid;?>',function(){
			jQuery('#file_progress_<?php echo $fieldid;?>').show();
			var formdata = false;
				formdata = new FormData();
				jQuery.each(jQuery('#upload<?php echo $fieldid;?>')[0].files, function(i, file) {
	    			formdata.append("upload<?php echo $fieldid;?>[]", file);
				});		
			jQuery.ajax({
		            url:'index.php?go=sidebar/file_uploader&status=upload&f=<?php echo $fieldid;?>',
		            type: 'POST',
					cache : false,
					data: formdata,
					processData: false,
					contentType: false,
		            success: function(responsetext) {
						//alert(responsetext);
						var linkfile = '<a href="<?php echo $config['baseurl'];?>index.php?go=view_file_temp&f='+responsetext+'" target="_blank">'+responsetext+'</a>';
						jQuery("#file_feed_<?php echo $fieldid;?>").html('<input type="hidden" name="upload_temp_<?php echo $field; ?>" id="upload_temp_<?php echo $fieldid;?>" value="'+responsetext+'"><a href="" class="hapus_temp_<?php echo $fieldid;?>"><img src="<?php echo $config['baseurl'].'images/delete2.png'; ?>" align="left" /></a>'+linkfile);
						jQuery('#file_progress_<?php echo $fieldid;?>').hide();
						jQuery('#file_form_<?php echo $fieldid;?>').hide();
			    	},
					error:
					function(e)
					{
						alert('gagal '+e);
					}
				});
		});
		
		jQuery(document).on('click','.hapus_temp_<?php echo $fieldid;?>',function(){
			if (confirm('Anda yakin ingin menghapus attachment ini?')) {
				
				var namafilehapus = jQuery('#upload_temp_<?php echo $fieldid;?>').val();
				//alert(namafilehapus);
				jQuery.ajax({
					url: 'index.php?go=sidebar/file_uploader&status=hapus_temp',
					type: 'POST',
					data: 'namafilehapus='+namafilehapus,
					success: function(msg){
						alert(msg);
						jQuery("#file_feed_<?php echo $fieldid;?>").html('');
						jQuery('#file_form_<?php echo $fieldid; ?>').html(inputtag);
						jQuery('#file_form_<?php echo $fieldid; ?>').show();		
					},
					error:
					function(e)
					{
						alert('gagal hapus '+e);
					}
				});
			}
			
			return false;
		});
		
		jQuery(document).on('click','.hapus_file_<?php echo $fieldid;?>',function(){
			if (confirm('Anda yakin ingin menghapus attachment ini?')) {
				
				jQuery('#file_hapus_<?php echo $fieldid;?>').html('........');
				var valuenya=jQuery('#<?php echo $fieldid;?>').val().trim();
				
				jQuery('#file_hapus_<?php echo $fieldid;?>').html('<input type="hidden" name="hapus_file_diattachment_<?php echo $fieldid;?>" value="'+valuenya+'"/>');	
				jQuery("#file_feed_<?php echo $fieldid;?>").html('');
				jQuery('#file_form_<?php echo $fieldid; ?>').html('<input type="hidden" name="<?php echo $field;?>" value="" />'+inputtag);
				jQuery('#file_form_<?php echo $fieldid; ?>').show();		
			}
			return false;
		});
	});
		
	</script>
	<?php
	if (!file_exists($temp_path))
		mkdir($temp_path,0777,true);
			
	if (!file_exists($path))
		mkdir($path,0777,true);
//echo '...'.$default_value;
	if ($default_value==''){	
	//jika blm ada attachment
	?>
		<span id="file_feed_<?php echo $fieldid;?>"></span>
		<span id="file_form_<?php echo $fieldid;?>">
		
			<div class="input-group">
				<span class="input-group-btn">
					<span class="btn btn-file">
						Browse <input type="file" name="<?php echo $field; ?>" id="upload<?php echo $fieldid; ?>" multiple size="1" <?php echo $disabled; ?> />
					</span>
				</span>
				<input type="text" class="form-control" readonly />
			</div>			
		</span>		
	<?php	
	} else {
	//jika sudah ada attachment	
		?>		
	
		
			<span id="file_feed_<?php echo $fieldid;?>">
				
				<?php if($disabled==""){?>
				<a href="" class="hapus_file_<?php echo $fieldid;?>">
					<img src="<?php echo $config['baseurl'].'images/delete2.png'; ?>" align="left" />
				</a>
				<?php } ?>
								
				<a href="<?php echo $config['baseurl'];?>index.php?go=view_file&f=<?php echo $default_value; ?>" target="_blank"><?php echo $default_value; ?></a>
				
				<input type="hidden" name="<?php echo $field;?>" id="<?php echo $fieldid;?>" value="<?php echo $default_value; ?>">
			</span>
			<span id="file_form_<?php echo $fieldid;?>"></span>
			<span id="file_hapus_<?php echo $fieldid;?>"></span>
		<!--</span>-->
	<!--</div>-->
	<?php
	}
	?>
		<span id="file_progress_<?php echo $fieldid;?>" style="display: inline-block;display: none;">
			<img src="<?php echo $config['baseurl'];?>images/ajax-loader.gif" align="middle" />
		</span>
	<?php
} //tutup tampilkan form
?>

