<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$fieldid		= str_replace('[]','',$fieldid);
$field_ref 			= $param['field_ref'];
$class 			= $param['class'];
$style 			= $param['style'];
$option			= $param['option'];
$default_value          = $param['value'];
$kosong			= $param['kosong'];
$data_live_search       = $param['data-live-search'];
$data_style		= $param['data-style'];

if (strlen($data_live_search)>0){
	$data_live_search = ' data-live-search="true" ';
} else $data_live_search = '';


if (is_array($option[0])){
?>

<select name="<?php echo $field; ?>" multiple="multiple" id="<?php echo $fieldid; ?>" <?php if (strlen($class)>0) echo 'class="'.$class.'"'; ?> <?php if (strlen($style)>0) echo 'style="'.$style.'"'; ?> <?php echo $data_live_search;?> data-style="<?php echo $data_style;?>">
<?php
$dataselect = array();
if (count($option)>0){
	if (strlen($kosong)>0){
		echo '<option value="">'.$kosong.'</option>';
	}
	foreach($option as $isioption){		
		$value = array_values($isioption);
                $defaultnya = array_values($default_value);
		$defvalue = '';
                if (cekAda($default_value,$field_ref,$value[0])){
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

<select name="<?php echo $field; ?>" multiple="multiple"  id="<?php echo $fieldid; ?>" <?php if (strlen($class)>0) echo 'class="'.$class.'"'; ?> <?php if (strlen($style)>0) echo 'style="'.$style.'"'; ?>>
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
<script type="text/javascript">
    $('#<?php echo $fieldid; ?>').tokenize();
</script>