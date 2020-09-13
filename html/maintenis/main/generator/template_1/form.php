<?php echo "<?php\n"; ?>
<?php echo "?>\n"; ?>

<?php echo "<?php\n"; ?>

$module   = '<?php echo $namamodule;?>';
$moduledb = '<?php echo $namatable;?>';


if (isset($_GET['id'])){
	$id = $_GET['id'];	
	$dbedit = doquery("select * from ".$moduledb." where id='".$id."'");
	$row = $dbedit[0];
}

	echo widgetbackend('actionmenu',array('<img src="../images/back.png">Batal'=> 'index.php?go='.$module));

<?php echo "?>\n"; ?>

<?php
	$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT, data_type FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
	$dataschema = doquery($sql);
?>

<fieldset style="width: 100%">
<legend accesskey=I> Data Information </legend>
<form name="form_<?php echo $module; ?>" action="" method="POST">
<div class="wide form">
	<?php 
		$field_exclude = array('id','ordering','published');
		
		foreach($dataschema as $schema){
			$komennya 			= $schema['COLUMN_COMMENT'];
			$komennya_stripped 	= str_replace('combobox=','',$komennya);
			$combobox 			= false;

			if (!in_array($schema['COLUMN_NAME'],$field_exclude)){	
?>
<div class="row">
			<label><?php echo ucwords(str_replace('_',' ',$schema['COLUMN_NAME'])); ?></label>
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

			<input type="text" name="<?php echo $schema['COLUMN_NAME']; ?>" id="<?php echo str_replace(' ','_',$schema['COLUMN_NAME']); ?>" value="<?php echo "<?php"; ?> echo $row['<?php echo $schema['COLUMN_NAME']; ?>']; <?php echo "?>"; ?>"/>
		
		<?php
				}
				?>
		</div>	
				<?php
			}			
			?>
						
			<?php
		}
	?>
	<div class="row">
		<label>Ordering</label>
		<input type="text" name="ordering" value="<?php echo "<?php"; ?> echo $row['ordering']; <?php echo "?>"; ?>" style="width: 50px;"/>
	</div>

	<div class="row">
		<label>Published</label>
		<?php echo "<?php\n"; ?> echo widgetbackend('inputselect',	array('field'=>'published',
												'option'=>array('1'=>'Ya','0'=>'Tidak'))
								 ); <?php echo "?>\n"; ?>
	</div>
	
	<div class="row">
		<label>&nbsp;</label>
		<input type="submit" value="Simpan" class="art-button" />
	</div>	
</div>

</form>
</fieldset>