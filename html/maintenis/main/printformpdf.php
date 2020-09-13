<?php

global $module, $moduledb, $moduledb_detail, $jenis;
$module 			= 'laporan';
//$moduledb 			= 't_bam';
//$moduledb_detail 	= 't_detailbam';

$do 	= filter_inputnya($_GET['do']);
$jenis 	= filter_inputnya($_GET['jenis']);

switch($do){
	case 'tambah':
		tambah();		
		break;	
	case 'ubah':
		ubah();
		break;
	case 'view':
		view();
		break;
	case 'list':
		include_once($module.'/list.php');
		break;
		
	default:
		include_once($module.'/list.php');
}	

function tambah(){
	
}

function ubah(){
	
}

function view() {
	global $module,$moduledb,$moduledb_detail, $config, $jenis;
	$kop = $_GET['kop'];
	$config['theme'] = '';
	//if ($jenis=='permohonan'){

	   ob_start();
	   
	   include($module.'/'.$jenis.'.php');
	   
		$content = ob_get_clean();
		//echo $config['baseurl']."main/html2pdf/html2pdf.class.php";
		include_once('html2pdf/html2pdf.class.php');
		
		//die();
		try
		{
			
			$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(5, 5, 5, 5));
		//      $html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output($jenis.'.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	//}
	//include_once($module.'/edit.php');
}	
?>