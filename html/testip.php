<!DOCTYPE html>
<html>
<head>
    <title>Akses Terbatas</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<!--<div class="ok"><p>Message Box success.</p></div>
<div class="warning"><p>Message Box warning.</p></div>-->
<?php
    require_once('my_alert.php');
    $chek_ip =  get_IP_address();
	// Declaration of strings 
    $intern_ip = "202.145.4.251"; 
  
// Use strcmp() function  
if (strcmp($chek_ip, $intern_ip) !== 0) 
   { 
   echo '<div class="error"><h1>Maaf, Pergantian Password hanya dapat diakses dalam lingkungan kantor PAMJAYA</h1>';
   echo '<h3>Bila mendesak, anda dapat menghubungi SIM di pesawat +62215704250 ext 4208</h3></div>'; 
   } 
else 
   { 
    header('Location: http://172.16.1.216/univention/self-service/#page=passwordchange'); 
   } 

?>

</body>
</html>

<?php

//$externalContent = file_get_contents('http://checkip.dyndns.com/');
//preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
//$externalIp = $m[1];

//$externalIp =  get_IP_address();
//my_alert('Hello', 'This is an OK message', 1, 'http://google.com'); 
//my_alert_body();
//echo "My IP address is $externalIp";

function get_IP_address()
{
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe

                if (filter_var($IPaddress,
                               FILTER_VALIDATE_IP,
                               FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                    !== false) {

                    return $IPaddress;
                }
            }
        }
    }
}

?>
