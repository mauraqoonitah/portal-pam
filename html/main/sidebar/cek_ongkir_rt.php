<style>
.task {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: #fcfcfc none repeat scroll 0 0;
    border-color: #eee;
    border-image: none;
    border-style: solid;
    border-width: 1px 1px 1px 3px;
    font-size: 13px;
    margin-bottom: 10px;
    padding: 10px 15px;
}
.span2 {
    width: 140px;
}
.span3 {
    width: 220px;
}
.pull-right {
    float: right;
}

h6.ro-result {
    margin: 0 !important;
}
.big {
    font-family: "Open Sans",sans-serif;
    font-size: 20px !important;
    font-weight: 300;
    margin-bottom: 10px;
}
h6 {
    font-size: 16px;
    line-height: 24px;
}
h3, h4, h5, h6 {
    color: #666;
    font-weight: 400 !important;
}
.color {
    color: #9b59bb;
}
h1, h2, h3, h4, h5, h6 {
    color: #666;
    font-family: "Open Sans",sans-serif;
    font-weight: 400 !important;
    margin: 2px 0 5px;
    padding: 2px 0;
}
.tmeta {
    font-size: 12px;
}
[class*="span"] {
    float: left;
    margin-left: 20px;
    min-height: 1px;
}
* {
    border-radius: 0 !important;
}
</style>
<?php
	$config['theme'] = '';
	
	
	function getCoslokal($origin,$origin_type,$destination,$destination_type,$weight,$courier){
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "origin=".$origin."&originType=".$origin_type."&destination=".$destination."&destinationType=".$destination_type."&weight=".$weight."&courier=".$courier,
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
	$origin = post('loc_vendor');
	$origin_type = post('loc_vendor_type');
	$destination = post('loc_user');
	$destination_type = post('loc_user_type');
	$weight = post('weight');
	$courier = post('courier');
	
	$cek_ongkir = getCoslokal($origin,$origin_type,$destination,$destination_type,$weight,$courier);
	$cekcek = $cek_ongkir->rajaongkir->results;
	foreach($cekcek as $data){
		//echo $data->name;
		//echo $data->costs;
		//print_r($data);
	foreach($data->costs as $datavalue){
		echo '
		<div class="task">
		<div class="row">
			<div class="span2">
				<h6 class="big ro-result"><strong>'.strtoupper($data->code).'</strong></h6>
			</div>
			<div class="span3">
				<h6 class="ro-result">'.$datavalue->service.'</h6>
			</div>';
		foreach($datavalue->cost as $datacost){
			echo '
			<div class="span2 pull-right" style="margin-right:20px;">
				<h6 class="ro-result color big pull-right">
					<strong>Rp '.$datacost->value.'</strong>
				</h6>
			</div>';
		}
		echo '</div>';
		echo '
		<div class="row visible-desktop">
			<div class="span2">
				<div class="tmeta">'.$data->name.'</div>
			</div>
			<div class="span3">
				<div class="tmeta">'.$datavalue->description.'</div>
			</div>
			<div class="span2 pull-right">
				<div class="tmeta pull-right"></div>
			</div>
		</div>
		</div>';
		//echo "<input type='radio' name='service' value='".$datavalue->service."'> ".$datavalue->service." ".$datavalue->cost." ".$datavalue->currency."<br>";
		//echo "<input type='radio' name='service' value='".$datavalue->service."'> ".$datavalue->service." ".$datavalue->cost." ".$datavalue->currency."<br>";
		
		//print_r($datavalue);
	}
	
	}
?>