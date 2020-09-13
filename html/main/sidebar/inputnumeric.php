<?php

registerJS($config['baseurl'].'res/autoNumeric/autoNumeric.js');

$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value          = $param['value'];
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

if ($default_value=='') {
    $default_value=0;
}

if ($style=='') {
    $style='text-align: right;padding-right:10px;';
}
    
if ($mode_edit!=='false') {
?>
<input type="text" <?php echo $str_number;?> class="<?php echo $class;?>" placeholder="<?php echo $placeholder;?>" name="<?php echo $field;?>" id="<?php echo $fieldid;?>" style="<?php echo $style;?>" value="<?php echo $default_value;?>" <?php echo $strmaxlength; ?> <?php echo $str_required; ?> />
<?php } else { ?>
    <div class="checkbox">
        <?php echo $default_value; ?>
    </div>
<?php } ?>
<script>
    $(document).ready(function(){
        $('#<?php echo $fieldid;?>').autoNumeric('init',{aSep: '.', aDec: ',', mDec: '0'}); 
        $('#<?php echo $fieldid;?>').focus(function() { $(this).select(); } );
    });
</script>