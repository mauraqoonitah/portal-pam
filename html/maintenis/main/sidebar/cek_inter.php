<?php

$config['theme'] = '';
function getCosInt($origin,$destination,$weight,$courier){
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://pro.rajaongkir.com/api/v2/internationalCost",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
				CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded",
					"key: 4bdc84de370ea696d678c8ad527f60ee"
				),
			));

			$response = json_decode(curl_exec($curl));
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$res = $response;
			}
			return $res;
		}
//include "inc/rajaongkir.class.php";
//$rajaongkir = new rajaOngkir();
$origin = post('origin');
$destination = post('destination');
$weight = post('weight');
$courier = post('courier');
$cek_inter = getCosInt($origin,$destination,$weight,$courier);
$cekcek = $cek_inter->rajaongkir->results;
//print_r($cek_inter);

echo "<hr>";
foreach($cekcek as $data){
	foreach($data->costs as $datavalue){
		echo "<input type='radio' name='service' value='".$datavalue->service."'> ".$datavalue->service." ".$datavalue->cost." ".$datavalue->currency."<br>";
	}
}

?>