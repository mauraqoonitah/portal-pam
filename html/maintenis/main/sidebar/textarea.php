<?php

$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value	= $param['value'];
$style			= $param['style'];
$class			= $param['class'];
$readonly		= $param['readonly'];
$disabled		= $param['disabled'];
$mode_edit              = $param['mode_edit'];
$placeholder		= $param['placeholder'];
$maxlength              = $param['maxlength'];
$rows              = $param['rows'];
$cols              = $param['cols'];

if ($class=='') {
    $class = 'form-control';
} 

if (strlen($maxlength)>0) {
    $strmaxlength = ' maxlength="'.$maxlength.'" ';
} else $strmaxlength = '';
  

?>
<textarea class="<?php echo $class;?>" placeholder="<?php echo $placeholder;?>" name="<?php echo $field;?>" id="<?php echo $fieldid;?>" style="<?php echo $style;?>" rows="<?php echo $rows; ?>" cols="<?php echo $cols; ?>"><?php echo $default_value;?></textarea>

