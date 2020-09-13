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
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    require_once('my_alert.php');
   // $chek_ip =  get_IP_address();
   $chek_ip =  get_client_ip();
	// Declaration of strings 
    $intern_ip = "203.161.27.194"; 
  
// Use strcmp() function  
if (strcmp($chek_ip, $intern_ip) !== 0) 
   { 
   echo "IP address: $chek_ip";
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

function clientInSameSubnet($client_ip=false,$server_ip=false) {
    if (!$client_ip)
        $client_ip = $_SERVER['REMOTE_ADDR'];
    if (!$server_ip)
        $server_ip = $_SERVER['SERVER_ADDR'];

    // Extract broadcast and netmask from ifconfig
    if (!($p = popen("ifconfig","r"))) return false;
    $out = "";
    while(!feof($p))
        $out .= fread($p,1024);
    fclose($p);

    // This is to avoid wrapping.
    $match  = "/^.*".$server_ip;
    $match .= ".*Bcast:(\d{1,3}\.\d{1,3}i\.\d{1,3}\.\d{1,3}).*";
    $match .= "Mask:(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})$/im";
    if (!preg_match($match,$out,$regs))
        return false;

    $bcast = ip2long($regs[1]);
    $smask = ip2long($regs[2]);
    $ipadr = ip2long($client_ip);
    $nmask = $bcast & $smask;

    return (($ipadr & $smask) == ($nmask & $smask));
}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>
