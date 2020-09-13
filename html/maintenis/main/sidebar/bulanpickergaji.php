<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$fieldid		= str_replace('[','',$fieldid);
$fieldid		= str_replace(']','',$fieldid);
$class 			= "select2-selection__rendered";
$style 			= $param['style'];
$option			=  $data_bulan = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
$default_value	= $param['value'];
$kosong			= $param['kosong'];
$data_style			= $param['data-style'];

if (strlen($data_live_search)>0){
	$data_live_search = ' data-live-search="true" ';
} else $data_live_search = '';


if (is_array($option[0])){
?>

<select name="<?php echo $field; ?>" id="<?php echo $fieldid; ?>" class="sel2 form-control">
<?php
$dataselect = array();
if (count($option)>0){
	if (strlen($kosong)>0){
		echo '<option value="">'.$kosong.'</option>';
	}
	foreach($option as $isioption){		
		$value = array_values($isioption);
		$defvalue = '';
			if ($default_value==$value[0]){
				$defvalue = 'selected="selected"';
			}
		echo '<option value="'.$value[0].'" '.$defvalue.'>'.$value[1].'</option>';		
	}	
}

?>
</select>
<?php	
} else {

?>

<select name="<?php echo $field; ?>" id="<?php echo $fieldid; ?>" class="sel2 form-control">
<?php
if (count($option)>0){
    
	foreach($option as $key => $value){
			// bagian ini memang aneh, tapi "" dianggap sama dengan "0"
			$defvalue = '';
			if ($default_value==""){
				$defvalue = '';
			} else if ($default_value!=$key){
				$defvalue = '';
			} else {
				$defvalue = 'selected="selected"';
			}
			echo '<option value="'.$key.'" '.$defvalue.'>'.$value.'</option>';		
		//}
		
	}	
}

?>
</select>

<?php
}
?>
