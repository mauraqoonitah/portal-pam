<?php
$field 			= $param['field'];
$fieldid		= str_replace(' ','_',$field);
$default_value	= $param['value'];
$style			= $param['style'];
$class			= $param['class'];
$readonly		= $param['readonly'];
$disabled		= $param['disabled'];
$mode_edit              = $param['mode_edit'];

?>
<script language="javascript">
$(document).ready(function() { 
    
    $('#<?php echo $fieldid;?>').daterangepicker({
                    singleDatePicker: true,
                    format: 'DD-MM-YYYY',
                    calender_style: "picker_1"
                }, function (start, end, label) {
                    //console.log(start.toISOString(), end.toISOString(), label);
                });
                    
});
</script>
    <?php if ($mode_edit) { ?>    

    <div class="col-md-11 xdisplay_inputx has-feedback">
        <input type="text" class="form-control has-feedback-left" id="<?php echo $fieldid;?>" name="<?php echo $field; ?>" aria-describedby="inputSuccess2Status" value="<?php echo $default_value; ?>" <?php echo $readonly; ?>>
        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
        <span id="inputSuccess2Status" class="sr-only">(success)</span>
    </div>

    <?php } else { ?>
    <div class="checkbox">
        <?php echo tgl_indo_angka($default_value); ?>
    </div>
    <?php } ?>
