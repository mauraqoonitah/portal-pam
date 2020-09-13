<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value	= $param['value'];
$style			= $param['style'];
$class			= $param['class'];
$disable        = $param['disable'];
$readonly        = $param['readonly'];
$disabled		= $param['disabled'];

if (strlen($disable)==0){
	$strdisable = '';
} else {
    
	$strdisable = ' disabled="disabled" ';
}


//'showAnim'=>'fold',
//							'dateFormat'=>'dd-mm-yy',
//							'changeMonth'=>true,
//							'changeYear'=>true,
	
?>

	
	<input class="form-control date-picker" <?php echo $disabled; ?> <?php echo $readonly; ?> id="<?php echo $fieldid;?>" name="<?php echo $field; ?>" data-date-format="dd-mm-yyyy" type="text" value="<?php echo $default_value; ?>"  />
	<span class="input-group-addon">
         <i class="fa fa-calendar"></i>
    </span>