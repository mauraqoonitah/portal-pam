<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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

	//echo widgetbackend('actionmenu',array('<img src="../images/back.png">Batal'=> 'index.php?go='.$module));

?>



<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4><a href="index.php?go=<?php echo $module; ?>" title="Batal" alt="Batal"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> </a> EDIT HALAMAN<br> </h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>

<div class="x_content"> 
<form class="form-horizontal" name="form_<?php echo $module; ?>" action="" method="POST">	
							
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>"/>
				</div>
			</div>	

			<div class="form-group">
			<label class="col-sm-2 control-label">Posisi</label>
			<div class="col-sm-7">
			<?php 
				$dbposisi = doquery('select posisi from posisi');
				$dataposisi = array();
				foreach($dbposisi as $rowposisi){
					$dataposisi[$rowposisi['posisi']] = $rowposisi['posisi'];
				}
				echo widgetbackend('inputselect',array('field'=>'posisi','option'=>$dataposisi,'value'=>$row['posisi']))
			?>
				</div>	
			</div>	

										
			<div class="form-group">
			<label class="col-sm-2 control-label">Widget</label>
			<div class="col-sm-7">
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
			$select_image = '<select class="form-control" id="'.$fieldid.'">\n';	
		} else {
			$select_image = '<select class="form-control" id="'.$fieldid.'" name="'.$field.'">\n';
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
			</div>	

	<div id="widgetparam" name="widgetparam">
<?php
if (file_exists($config['basepath'].'main/sidebar/'.$row['widget'].'-param.php')){
	include_once($config['basepath'].'main/sidebar/'.$row['widget'].'-param.php');
	//debugvar($param);
	?>

	<div class="form-group">
		<label class="col-sm-2 control-label">Parameter</label>
		<div class="col-sm-7">
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
	</div>
	<?php
}

?>
	</div>

										
			<div class="form-group">
			<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-7">
<?php	echo widgetbackend('textarea',array( 	'field' => 'keterangan',
												'value' => $row['keterangan'],
												'rows'	=> '10',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
			?>		
				</div>	
			</div>	
										
	<div class="form-group">
		<label class="col-sm-2 control-label">Desain sesuai template</label>
		<div class="col-sm-7">
		<?php
 echo widgetbackend('inputselect',	array('field'=>'desain_sesuai_template',
												'option'=>array('1'=>'Ya','0'=>'Tidak'),
												'value'=>$row['desain_sesuai_template'],
												'asfield'=>'true',
												)
								 ); ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Ordering</label>
		<div class="col-sm-7">
			<input type="text" class="form-control"  name="ordering" value="<?php echo $row['ordering']; ?>" style="width: 50px;"/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Published</label>
		<div class="col-sm-7">
		<?php
 echo widgetbackend('inputselect',	array('field'=>'published',
												'option'=>array('1'=>'Ya','0'=>'Tidak'),
												'value'=>$row['published'],
												'asfield'=>'true',
												)
								 ); ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">&nbsp;</label>
		<div class="col-sm-7">
		<input type="submit" value="Simpan" class="btn btn-primary" />
		</div>
	</div>
</form>
</div>			

				

		</div>	

	</div>
<script type="text/javascript">
				CKEDITOR.replace('keterangan');
				
</script>