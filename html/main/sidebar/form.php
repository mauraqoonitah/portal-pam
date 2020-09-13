<script language="javascript">
$(function(){
	$('#widget').change(function(){
		$('#loader').html('<img src="<?php echo $config['baseurl']; ?>images/ajax-loader.gif">');
		//$('#widgetparam').html('xxx');
		
		var datanya = 'widget='+$('#widget').val();
		
			$.ajax({
				url:'index.php?go=sidebar/jx_get_param',
		        type:'post',
		        cache : false,
		        data: datanya,
		        success: function(responsetext) {	
							$('#widgetparam').html(responsetext);
							$('#loader').html('');
							
	            }
			});	
		
	});	
});
</script>
<?php

$module   = 'sidebar';
$moduledb = 'sidebar';


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
			<label>Nama</label>

			<input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>"/>
		
				</div>	

			<div class="row">
			<label>Posisi</label>

			
			<?php 
				$dbposisi = doquery('select posisi from posisi');
				$dataposisi = array();
				foreach($dbposisi as $rowposisi){
					$dataposisi[$rowposisi['posisi']] = $rowposisi['posisi'];
				}
				echo widgetbackend('inputselect',array('field'=>'posisi','option'=>$dataposisi,'value'=>$row['posisi']))
			?>
				</div>	

										
			<div class="row">
			<label>Widget</label>

<?php
	$field = 'widget';
	$asfield = 'true';
	$fieldid = str_replace(' ','_',$field);
	$default_value = $row['widget'];
	global $config;
	$path 			= $config['basepath'] . 'main/sidebar';
	
	$listDir = array();
        if($handler = opendir($path)) {
            while (($sub = readdir($handler)) !== FALSE) {
                if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db" && stripos($sub,'.php')>0) {
					
                    if(is_file($path."/".$sub)) {
                    	
						$sub = str_replace('.php','',$sub);	
						if (strpos($sub,'-param')<1){
							$listDir[] = $sub;
						}
						
                        
                    }
                }
            }
            closedir($handler);
        }
		if ($asfield=='false'){
			$select_image = '<select id="'.$fieldid.'">\n';	
		} else {
			$select_image = '<select id="'.$fieldid.'" name="'.$field.'">\n';
		}
		
			$select_image .= '   <option value="">- pilih -</option>';
        foreach($listDir as $img){
			$selected = '';
			if ($default_value == $img) {
				$selected = ' selected="selected" ';
			}
			$select_image .= '   <option value="'.$img.'" '.$selected.'>'.$img.'</option>\n';
		}
		$select_image .= '</select>';
		echo $select_image;
	?><div id="loader"></div>
			
		
				</div>	

	<div id="widgetparam" name="widgetparam">
<?php
if (file_exists($config['basepath'].'main/sidebar/'.$row['widget'].'-param.php')){
	include_once($config['basepath'].'main/sidebar/'.$row['widget'].'-param.php');
	//debugvar($param);
	?>

	<div class="row">
		<label>Parameter</label>
		
		<div style="display: block;float: left;">
		<?php
		$dbparam = doquery('select * from sidebar_param where id_sidebar='.q($id));
		if (isset($arrdb_param)){
			unset($arrdb_param);	
		}
		
		foreach($dbparam as $row_param){
			$arrdb_param[$row_param['nama_param']] = $row_param['value_param'];
		}
		foreach($param as $key=>$value){
			echo '<span style="display:inline-block;width:100px;margin-left:30px;">'.$key.'</span><input type="text" name="param['.$key.']" value="'.$arrdb_param[$key].'"/><br/>';
		}
		
		?>
		</div>
	</div>
	<?php
}

?>
	</div>

										
			<div class="row">
			<label>Keterangan</label>
<?php	echo widgetbackend('xheditor',array( 	'field' => 'keterangan',
												'value' => $row['keterangan'],
												'rows'	=> '10',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
			?>		</div>	
										
	<div class="row">
		<label>Desain sesuai template</label>
		<?php
 echo widgetbackend('inputselect',	array('field'=>'desain_sesuai_template',
												'option'=>array('1'=>'Ya','0'=>'Tidak'),
												'value'=>$row['desain_sesuai_template'],
												'asfield'=>'true',
												)
								 ); ?>
	</div>
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" value="<?php echo $row['ordering']; ?>" style="width: 50px;"/>
	</div>

	<div class="row">
		<label>Published</label>
		<?php
 echo widgetbackend('inputselect',	array('field'=>'published',
												'option'=>array('1'=>'Ya','0'=>'Tidak'),
												'value'=>$row['published'],
												'asfield'=>'true',
												)
								 ); ?>
	</div>
	
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan" class="art-button" />
	</div>	
</div>

</form>
</fieldset>