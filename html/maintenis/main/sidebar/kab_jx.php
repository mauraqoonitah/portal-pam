<?php
$config['theme'] = '';
$kdprop = post('kdprop');
$kdkab  = post('kdkab');
$code   = post('code');
//debugvar($_POST);
//echo $code;

if ($code != '9uasd98ausd7ysdf8s'){
	die('restricted area');
}

$data = doquery('select f_kdkab,concat(f_kdkab," - ",f_nmdaerah)  from fdaerah where f_kdprop='.q($kdprop)); 
			
echo widgetbackend('inputselectsearch',array(	'field'		=> 'f_kdkab',
												'value'		=> $kdkab,
												'kosong'	=> '- pilih -',
												'option'	=> $data,
												'class'		=> 'form-control selectpicker',
												)); 
?>

<script language="javascript">
$(document).ready(function() { 			
	$('.selectpicker').selectpicker('show');
});
</script>