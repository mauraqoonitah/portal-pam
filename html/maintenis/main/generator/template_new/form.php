<?php echo "<?php\n"; ?>
//registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');
$module   = '<?php echo $namamodule;?>';
$moduledb = '<?php echo $namatable;?>';
if (isset($_GET['id'])){	
	$id = get('id');		
	$sql = "select * from ".$moduledb." t 				
		where id=$id";   
		//echo $sql;	
		$dbedit = doquery($sql);	
		$row = $dbedit[0];
	}
<?php echo "?>\n"; ?>
		<script language="javascript">
			$(document).ready(function() {
				
			});
		</script>
<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
?>
		<div class="row">
		<div class="col-lg-12">	
		<div class="widget">	
		<div class="widget-header  with-footer">		
		<div class="widget-caption">			
		<h4><?php echo "<?php\n"; ?> echo $action; <?php echo "?>\n"; ?></h4>		
		</div>		
		<div class="clearfix"></div>	
		</div>		
		<div class="panel-collapse collapse in" id="ft-0">			
		<div class="widget-body">				
		<form class="form-horizontal" role="form" action="" method="post">					
		<!-- konten start di sini -->                                        
		<div class="space-12"></div>  
<?php 
		$field_exclude = array('id','ordering','published');
		
		foreach($dataschema as $schema){
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped              = str_replace('combobox=','',$komennya);
			$combobox 			= false;
                        $array_replace                  = array("_", "id");
			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){	
?>		
		<div class="form-group">						
		<label class="col-sm-2 control-label"><?php echo ucwords(str_replace($array_replace,' ',$schema['COLUMN_NAME'])); ?></label>						
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
						echo "<?php echo widgetbackend('inputselect',array('field'=>'".$schema['COLUMN_NAME']."','value'=>\$row['".$schema['COLUMN_NAME']."'],'option'=>array('empty'=>'- pilih -',".$komennya_stripped."))); ?>";
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
						echo "<?php echo widgetbackend('inputselect',array('field'=>'".$schema['COLUMN_NAME']."','value'=>\$row['".$schema['COLUMN_NAME']."'],'kosong'=>'- pilih -','option'=>\$data".str_replace(' ','_',$schema['COLUMN_NAME']).")); ?>";
					}
				} else if ($schema['data_type']=='text'){
                                    //wysiwyg editor
                                    echo "<?php	echo widgetbackend('xheditor',array( 	'field' => '".$schema['COLUMN_NAME']."',
												'value' => \$row['".$schema['COLUMN_NAME']."'],
												'rows'	=> '10',
												'cols'	=> '50',
												'width'	=> '80%',
											)); 
                                    ?>";
				} else if ($schema['data_type']=='date'){
                                    //kalau formatnya date gunakan datepicker
                                    echo "<?php echo widgetbackend('datepicker',array('field'=>'".$schema['COLUMN_NAME']."','value'=> tgl_indo_angka(\$row['".$schema['COLUMN_NAME']."']))); ?>";
				} else if (stripos($komennya,'image_uploader')!==false){
                                    //kalau komennya image_uploader
                                    $pathimage = str_replace('image_uploader=','',$komennya);
                                    echo "<?php echo widgetbackend('image_uploader',array('field'=>'".$schema['COLUMN_NAME']."','value'=>\$row['".$schema['COLUMN_NAME']."'],'path'=>'".$pathimage."')); ?>";
				} else {
?>
		<input type="text" name="<?php echo $schema['COLUMN_NAME']; ?>" id="<?php echo str_replace(' ','_',$schema['COLUMN_NAME']); ?>" value="<?php echo "<?php\n"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>'];<?php echo "?>\n"; ?>" class="form-control" maxlength="100"/>						
<?php
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
		<button type="submit" class="btn btn-primary" style="width: 100px;"><span class="fa fa-check icon-only"></span> Simpan</a>						
		</div>					
		</div>	<!-- konten selesai di sini -->					
		</form>				
		</div>			
		</div>		
		</div>	
		</div>
		</div>
		</div>