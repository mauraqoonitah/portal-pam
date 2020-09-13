<?php
  $config['theme']='';
  $tahun = date('Y');
  $bulan = post('bulan');
  function cari_bulan_depan($bulan){
	$bulan = $bulan+1;
	$bulan = tambah_nol($bulan, 2);
	return "-".$bulan."-";
}
  $sql_kgb =  ' select * from v_kgb where tmt_pertama like "%'.cari_bulan_depan($bulan).'%" ';
  $query_kgb = doquery($sql_kgb);
  foreach($query_kgb as $row){
  $sqlnya = ' insert into renpol(id_anggota,tahun,bulan) '
                . ' values ('.q($row['id']).','.$tahun.','.$bulan.') '
                . ' on duplicate key update id_anggota=values(id_anggota),tahun=values(tahun),bulan=values(bulan)';
  //echo $sqlnya ;
  doexec($sqlnya);
  }
?>