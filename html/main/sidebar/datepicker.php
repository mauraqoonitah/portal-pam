<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value          = $param['value'];
$style			= $param['style'];
$class			= $param['class'];
$readonly		= $param['readonly'];
$disabled		= $param['disabled'];
$mode_edit              = $param['mode_edit'];
$required               = $param['required'];

$tgl = $default_value;
if ($tgl=='') {
    $tgl = date('d-m-Y');
}

if (strlen(required)>0) {
    $str_required = ' required="required" ';
} else {
    $str_required = '';
}
registerJS($config['baseurl'].'res/mask/jquery.maskedinput.min.js');
registerJS($config['baseurl'].'themes/'.$config['theme'].'/js/daterangepicker/daterangepicker.js');
registerJS($config['baseurl'].'themes/'.$config['theme'].'/js/daterangepicker/moment.js');
registerCSS($config['baseurl'].'themes/'.$config['theme'].'/css/daterangepicker.css');
?>

<script language="javascript">
$(document).ready(function() { 
    
    //$('#<?php echo $fieldid;?>').datepicker({dateFormat: 'dd-mm-yy',showAnim: 'fold'});
    $('#<?php echo $fieldid;?>').daterangepicker({
                    singleDatePicker: true,
                    format: 'DD-MM-YYYY',
                    showDropdowns: true,
                    calender_style: "picker_1"
                }, function (start, end, label) {
                    //console.log(start.toISOString(), end.toISOString(), label);
                });
                    
    $("#<?php echo $fieldid;?>").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
    
});
</script>
    <?php if ($mode_edit) { ?>    

    <div class="">
        <input type="text" class="form-control has-feedback-left" id="<?php echo $fieldid;?>" name="<?php echo $field; ?>" aria-describedby="inputSuccess2Status" value="<?php echo $tgl; ?>" <?php echo $readonly; ?> <?php echo $str_required; ?>>
        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" style="top:10px;"></span>
        <span id="inputSuccess2Status" class="sr-only">(success)</span>
    </div>

    <?php } else { ?>
    <div class="checkbox">
        <?php echo tgl_indo_angka($default_value); ?>
    </div>
    <?php } ?>
