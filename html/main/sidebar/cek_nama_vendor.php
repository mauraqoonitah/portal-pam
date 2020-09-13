<?php
$config['theme']='';
//echo "a";


$reg_namavendor = trim(strtolower($_POST['reg_namavendor']));
$reg_namavendor = mysql_escape_string($reg_namavendor);
$str_get_session = '';
//echo 'tes0';
if ($_SESSION['role']==='5') {
    $data_vendor = getDataVendor($_SESSION['userid']);
    //echo $reg_namavendor;
    //echo $data_vendor['nama_vendor'];
    if ($reg_namavendor==strtolower($data_vendor['nama_vendor'])) {
        //nothing to do
        //$query = "SELECT nama_vendor FROM ec_vendor WHERE nama_vendor = '$reg_namavendor' $str_get_session LIMIT 1";
        echo '0';
        //echo 'tes1';
    } else {
        //echo 'tes2';
        cekvendor($reg_namavendor);
    }
} else {
    //jika vendor baru
    //echo 'tes3';
    cekvendor($reg_namavendor);
}
//echo $query;
//debugvar($_SESSION);
//debugvar($datavendor);
function cekvendor($reg_namavendor){
    $query = "SELECT nama_vendor FROM ec_vendor WHERE nama_vendor = '$reg_namavendor' LIMIT 1";
    $result = mysql_query($query);
    $num = mysql_num_rows($result);
    //$num = $result;
    //echo $query;
    echo $num;
}

