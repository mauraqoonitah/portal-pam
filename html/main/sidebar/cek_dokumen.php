<?php
		
	$value 	= $param['value'];
	
	if ($value=='Y'){
		$str_checked = ' checked="checked" ';
	} else {
		$str_checked = '';
	}
	
	$field 			= $param['field'];
	$fieldid		= str_replace(' ','_',$field);
	$fieldid		= str_replace('[','',$fieldid);
	$fieldid		= str_replace(']','',$fieldid);
	$judul			= $param['judul'];
	$path_relative	= $param['path_relative'];
?>

<div class="form-group">							
	<label class="col-sm-5 control-label"><?php echo $judul;?></label>
		<div class="col-sm-2">
			<div class="input-group">
			<?php
			//debugvar($db_dpkab);
			//$dapil = $db_detail['f_kdprop'].$db_detail['f_kdkab'].$db_detail['f_kddpkab'];
			$file_sk = $path_relative;
			$path_file_sk = $config['basepath'] . 'attachment/' . $file_sk;
			if (file_exists($path_file_sk)){
				?>
					<a class="btn" href="<?php echo $config['baseurl'];?>index.php?go=view_file&f=<?php echo $file_sk;?>" target="_blank">Tampilkan Dokumen</a>
				<?php
				} else {
				?>
					<div class="col-sm-3">
						<button type="submit" class="btn" style="background-color: #ff5757">(Dokumen Belum Diupload)</button>
					</div>	
				<?php	
				}
				?>
			</div>
		</div>

		<div class="col-sm-5">
			<label class="col-sm-6 control-label">sudah diteliti?</label>
			<div class="col-sm-6"><input name="<?php echo $field;?>" id="<?php echo $fieldid;?>" class="tc tc-switch tc-switch-5" type="checkbox" <?php echo $str_checked;?> /><span style="margin-top: 5px" class="labels"></span></div>
		</div>									
	</div>