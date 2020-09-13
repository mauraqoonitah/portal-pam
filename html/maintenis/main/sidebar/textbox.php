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
$null                   = $param['null'];

if ($null=='NO') {
    $str_required = ' required="required" ';
} else $str_required = '';

if ($class=='') {
    $class = 'form-control';
} 

if (strlen($maxlength)>0) {
    $strmaxlength = ' maxlength="'.$maxlength.'" ';
} else $strmaxlength = '';
  
if ($mode_edit) {
?>
<input type="text" class="<?php echo $class;?>" placeholder="<?php echo $placeholder;?>" name="<?php echo $field;?>" id="<?php echo $fieldid;?>" style="<?php echo $style;?>" value="<?php echo $default_value;?>" <?php echo $strmaxlength; ?> <?php echo $str_required; ?> />
<?php } else { ?>
    <div class="checkbox">
        <?php echo $default_value; ?>
    </div>
<?php } ?>
