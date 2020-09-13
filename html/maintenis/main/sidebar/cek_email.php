<?php
$config['theme']='';
$cekemail = $_POST['reg_email'];
$dataemail = doGetDataById('user',$cekemail,'email');
if ($dataemail){
	$num = 1;
} else{
	$num = 0;
}
echo $num;