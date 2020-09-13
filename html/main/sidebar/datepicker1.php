<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value	= $param['value'];
$style			= $param['style'];
$class			= $param['class'];

//'showAnim'=>'fold',
//							'dateFormat'=>'dd-mm-yy',
//							'changeMonth'=>true,
//							'changeYear'=>true,
	
?>

	<script language="javascript">
	$(function() {
		$( "#<?php echo $fieldid; ?>" ).datepicker({format: 'dd-mm-yyyy',showAnim: 'fold'});
	});
	</script>
	<input id="<?php echo $fieldid;?>" name="<?php echo $field; ?>" type="text" value="<?php echo $default_value; ?>" style="<?php echo $style;?>" class="<?php echo $class;?>" />