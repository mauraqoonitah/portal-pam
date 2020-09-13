<?php

$field 			= $param['field'];

$fieldid		= str_replace(' ','_',$field);

$fieldid		= str_replace('[','',$fieldid);

$fieldid		= str_replace(']','',$fieldid);

$class 			= "select2-selection__rendered";

$style 			= $param['style'];

$option			= $param['option'];

$default_value	= $param['value'];

$kosong			= $param['kosong'];

$readonly			= $param['readonly'];

$disabled			= $param['disabled'];

$data_style			= $param['data-style'];
$mode_edit			= $param['mode_edit'];




if ($class=='') {

    $class = 'form-control';

} 

if ($mode_edit) {
?>



<select <?php echo $readonly; ?> <?php echo $disabled; ?> name="<?php echo $field; ?>" id="<?php echo $fieldid; ?>" class="form-control">

<?php


			if ($default_value==$value[0]){

				$defvalue = 'selected="selected"';

			}
	
		echo '<option value="1" '.$defvalue.'>Aktif</option>';		
		echo '<option value="0" '.$defvalue.'>Tidak Aktif</option>';		



?>

</select>





<?php

}else{
	echo "<div class='checkbox'>";
	if($default_value=="1"){
		echo "Aktif";
	}else{
		echo "Tidak Aktif";
	}
	echo "</div>";
}

?>

