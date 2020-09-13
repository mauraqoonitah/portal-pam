<?php echo "<?php\n"; ?>
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = '<?php echo $namamodule;?>';
$moduledb = '<?php echo $namatable;?>';

if (count($_SESSION['temp_form'])>0){
    $row = $_SESSION['temp_form'];
    //unset($_SESSION['temp_form']);
}            
if (isset($_GET['id'])){	
	$id = get('id');
        if (count($_SESSION['temp_form'])>0){
            $row = $_SESSION['temp_form'];
            //unset($_SESSION['temp_form']);
        } else {
        
            $sql = "select * from ".$moduledb." t 				
                    where id=$id";   
                    //echo $sql;	
                    $dbedit = doquery($sql);	
                    $row = $dbedit[0];
        }
}
<?php echo "?>\n"; ?>
		<script language="javascript">
			$(document).ready(function() {
				
			});
		</script>
<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH, IS_NULLABLE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
			<div class="x_title">
                <h4><?php echo $action; ?></h4>		
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link" style="cursor: pointer;"><i class="fa fa-chevron-up"></i></a>
                    </li>                                        
                </ul>
                <div class="clearfix"></div>
            </div>
		<div class="x_content">                
		<form class="form-horizontal" role="form" action="" method="post">					
		<!-- konten start di sini -->                                        
		<div class="space-12"></div>  
<?php 
		$field_exclude = array('id','created_by','created_date','modified_by','modified_date');
		//debugvar($dataschema);
		//die();
		foreach($dataschema as $schema){
			//echo $schema['data_type'];
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped              = str_replace('combobox=','',$komennya);
			$combobox 			= false;
                        $array_replace                  = array("_", "id");
		
                if ($schema['COLUMN_NAME']=='ordering') {
                ?>
                    <div class="form-group">						
                    <label class="col-sm-2 control-label"><?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?></label>
                    <div class="col-sm-1">
                        <input type="text" name="<?php echo $schema['COLUMN_NAME']; ?>" id="<?php echo str_replace(' ','_',$schema['COLUMN_NAME']); ?>" value="<?php echo "<?php\n"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>'];<?php echo "?>\n"; ?>" class="form-control"/>
                    </div>
                    </div>
                <?php
                } else if ($schema['COLUMN_NAME']=='published') {
                    echo "<?php ";
                    echo "\$arrPub".str_replace(' ','_',$schema['COLUMN_NAME'])." = array('1'=>'Ya','0'=>'Tidak');";
                    echo " ?>";
                ?>
                    <div class="form-group">						
                    <label class="col-sm-2 control-label"><?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?></label>
                    <div class="col-sm-1">
                        <?php
echo "<?php echo widgetbackend('inputselect',array( 'field'=>'".$schema['COLUMN_NAME']."',
                                                    'value'=>\$row['".$schema['COLUMN_NAME']."'],
                                                    'mode_edit'=>\$mode_edit,
                                                    'kosong'=>'- pilih -',
                                                    'option'=>\$arrPub".str_replace(' ','_',$schema['COLUMN_NAME']).")); ?>";
                        ?>
                        
                    </div>
                    </div>
                <?php
                } else if (!in_array($schema['COLUMN_NAME'],$field_exclude)){
                    //tampilkan semua form yg valid
?>		
		<div class="form-group">						
                    <label class="col-sm-2 control-label"><?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?><?php echo '<?php'; ?> if ($mode_edit) { echo '<?php if ($schema['IS_NULLABLE']=='NO') { echo ' *'; } ?>'; } <?php echo '?>';?></label>
		<div class="col-sm-3">  
<?php
				
				// jika field inputnya berupa combobox
				if (stripos($komennya,'combobox')!==false)
				{
					$combobox = true;
					$sql2 = ' SELECT  TABLE_NAME AS `table_name`, COLUMN_NAME AS `column_name`, REFERENCED_COLUMN_NAME AS `referenced_column_name`, REFERENCED_TABLE_NAME AS `referenced_table_name` FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE()  AND REFERENCED_TABLE_SCHEMA = DATABASE() AND table_name="'.$namatable.'" AND column_name="'.$schema['COLUMN_NAME'].'" AND table_schema = "'.$config['database'].'"';
					$res2 = doquery($sql2);
		
					$adarelasi = false;
					foreach ($res2 as $columnx){		
						$kolomrelasi = $columnx['referenced_column_name'];
						$modelrelasi = $columnx['referenced_table_name'];
                                        $adarelasi = true;    
					}
					
					if (!$adarelasi){
						$komennya_stripped = str_replace('combobox=','',$komennya);
						echo "<?php echo widgetbackend('inputselect',array( 'field'=>'".$schema['COLUMN_NAME']."',
                                                                                                    'value'=>\$row['".$schema['COLUMN_NAME']."'],
                                                                                                    'mode_edit' => \$mode_edit,
                                                                                                    'option'=>array('empty'=>'- pilih -',".$komennya_stripped."))); ?>";
					} else {
						//jika combobox ada relasi maka
						$fieldshow = str_replace('combobox=','',$komennya);
						$sqlnya = 'select id,'.$fieldshow.' from '.$modelrelasi;
						//echo $sqlnya;
						//die();
						$dataselect = doquery($sqlnya);
						$optionselect = '';
						$i = 0;
						foreach($dataselect as $rowselect){
							$i++;
							if ($i==count($dataselect)){
								$optionselect .= "'".$rowselect['id'] . "'=>'" . $rowselect[$fieldshow] . "'";
							} else {
								$optionselect .= "'".$rowselect['id'] . "'=>'" . $rowselect[$fieldshow] . "',";
							}
							
						}
						echo "<?php \$data".str_replace(' ','_',$schema['COLUMN_NAME'])." = doquery('select id,".$fieldshow." from ".$modelrelasi." order by ordering asc'); ?>\n";
						echo "<?php echo widgetbackend('inputselect',array( 'field'=>'".$schema['COLUMN_NAME']."',
                                                                                                    'value'=>\$row['".$schema['COLUMN_NAME']."'],
                                                                                                    'mode_edit' => \$mode_edit,
                                                                                                    'kosong'=>'- pilih -',
                                                                                                    'option'=>\$data".str_replace(' ','_',$schema['COLUMN_NAME']).")); ?>";
					}
                                    } else if ($schema['DATA_TYPE']=='text' && stripos($komennya, 'wysiwyg')){
                                    //wysiwyg editor
                                    echo "<?php	echo widgetbackend('editor_wysiwyg',array( 	'field' => '".$schema['COLUMN_NAME']."',
												'value' => \$row['".$schema['COLUMN_NAME']."'],
												'rows'	=> '10',
												'cols'	=> '50',
												'width'	=> '80%',
                                                                                                'mode_edit' => \$mode_edit,
											)); 
                                    ?>";
                                    } else if ($schema['DATA_TYPE']=='text'){
                        echo "<?php    echo widgetbackend('textarea',array('field'    => '".$schema['COLUMN_NAME']."',
                                                            'mode_edit' => \$mode_edit,
                                                            'rows' 		=> '5',
                                                            'value'     => \$row['".$schema['COLUMN_NAME']."'],
                        ));?>";
                                        
                                    } else if ($schema['DATA_TYPE']=='date'){
                                        //kalau formatnya date gunakan datepicker
                                        echo "<?php echo widgetbackend('datepicker',array('field'=>'".$schema['COLUMN_NAME']."','value'=> tgl_indo_angka(\$row['".$schema['COLUMN_NAME']."']))); ?>";
                                    } else if (stripos($komennya,'image_uploader')!==false){
                                        //kalau komennya image_uploader
                                        $pathimage = str_replace('image_uploader=','',$komennya);
                                        echo "<?php echo widgetbackend('image_uploader',array('field'=>'".$schema['COLUMN_NAME']."','value'=>\$row['".$schema['COLUMN_NAME']."'],'path'=>'".$pathimage."')); ?>";
                                    } else {
		echo "<?php	echo widgetbackend('textbox',array('field'    => '".$schema['COLUMN_NAME']."',
                                                            'mode_edit' => \$mode_edit,
                                                            'null'      => '".$schema['IS_NULLABLE']."',
                                                            'placeholder'  => '". ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME']))."',
                                                            'value'     => \$row['".$schema['COLUMN_NAME']."'],
                                                            'maxlength' => '".$schema['CHARACTER_MAXIMUM_LENGTH']."',
                        ));?>";
		
				}
?>
		</div>					
		</div>                    
<?php
			}
		}
?>		                
		<div class="space-12"></div>                    
		<hr class="separator" />                  
		<div class="form-group">						
		<label class="col-sm-2 control-label">&nbsp;</label>						
		<div class="col-sm-3">                           
		<a class="btn" href="<?php echo "<?php\n"; ?> echo $config['baseurl'].'index.php?go='.$module;<?php echo "?>\n"; ?>"><span class="fa fa-arrow-circle-left"></span> Batal</a>
		<?php
		echo "<?php if (\$mode_edit=='true') { ?>";
		?>
		<button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</button>
		<?php
		echo "<?php } else { ?>";
		?>
                <a href="<?php echo '<?php ';?>echo $config['baseurl'].'index.php?go='.$module.'&do=ubah&id='.$id;?>" class="btn btn-primary" style="width: 100px;"><span class="fa fa-pencil icon-only"></span> Edit</a>
                <?php
		echo "<?php } ?>";
		?>
		</div>					
		</div>	<!-- konten selesai di sini -->					
		</form>				
		</div>			
				
		</div>	
	</div>
</div>
		