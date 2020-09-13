<?php
global $module, $moduledb,$moduledb_file, $sort_order, $pesan_mode;
$module 	= 'event';
$moduledb 	= 'event';

$config['judul']    = 'Settings Event';

$do 	= $_GET['do'];

$tipe 	= $_GET['tipe'];





switch($do){



	case 'list':



		global $sort_order;



		include_once($module.'/list.php');



		break;



	case 'list_jx':



		global $sort_order;



		unset($_SESSION['temp_form']);



		include_once($module.'/list_jx.php');



		break;



	case 'tambah':



		tambah();



		break;



	case 'ubah':



		ubah();



		break;



	case 'view':



		include_once($module.'/view.php');



		break;		

	case 'hapus':



		hapus();



		break;



	default:



		include_once($module.'/list.php');



}	

function tambah(){
	global $module,$moduledb, $config, $mode_edit;
	//cek apakah di post
		if (sizeof($_POST)>0){

			//lakukan simpan ke table event

		 	$input=$_POST;

			$input['created']=date('Y-m-d H:i:s');

			$input['created_by']=$_SESSION['userid'];

            unset($input['tag']);

			$full_text = $_POST['full_text'];

			unset($input['full_text']);

			$full_text = str_replace('[iframe','<div class="video"><iframe',$full_text);

			$full_text = str_replace('[/iframe]','</iframe>',$full_text);

			$full_text = str_replace('[embed','<embed',$full_text);

			$full_text = str_replace('[/embed]','</embed></div>',$full_text);

			$input['full_text'] = $full_text;

			//print_r($input);

			//die();

			

			//lakukan simpan ke database menu

			$result = doinsert($module,$input);

			

			//get id yg baru saja diinsert

			$lastid = dogetlastid();

                        $id_event = $lastid;

                        

			//update orderingnya

			$fields = array('ordering'=>$lastid);

			$result = doupdate($module,$fields,'id='.$lastid);

			//debugvar($_POST);



			

			if ($result) {

                            $tag = $_POST['tag'];

                    

                            foreach($tag as $row_tag){

                                if (intval($row_tag)>0) {

                                    //simpan ke event_tag

                                    $simpanTag = array();

                                    $simpanTag['id_tag']   = $row_tag;

                                    $simpanTag['id_event']  = $id_event;

									

                                    doinsert('event_tag',$simpanTag);

                                } else {

                                    //simpan baru ke table tag

                                    $simpanTag = array();

                                    $simpanTag['nama_tag']       = $row_tag;                            

                                    doinsert('tag',$simpanTag);

                                    $id_tag = dogetlastid();



                                    //simpan ke product tag

                                    $simpanTag = array();

                                    $simpanTag['id_tag']       = $id_tag;

                                    $simpanTag['id_event']  = $id_event;

                                    doinsert('event_tag',$simpanTag);

                                }

                            }


                           

		 		redirect('index.php?go='.'event','berhasil di simpan');
			} else {

$_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';

			}

		}

		

		include_once($module.'/create.php');

}	

		

function ubah(){

	global $module;

		//cek apakah di post

		if (sizeof($_POST)>0){

			$id = $_GET['id'];

			$input=$_POST;

			$input['modified_by']=$_SESSION['userid'];

            unset($input['tag']);

			$full_text = $_POST['full_text'];

			unset($input['full_text']);

			$full_text = str_replace('[iframe','<iframe',$full_text);

			$full_text = str_replace('[/iframe]','</iframe>',$full_text);

			$full_text = str_replace('[embed','<embed',$full_text);

			$full_text = str_replace('[/embed]','</embed>',$full_text);

			$input['full_text'] = $full_text;

			$result = doupdatedebug("event",$input,"id='".$id."'");

			//echo $result;

			//print_r($input);

			//die();

                        $id_event = $id;

			

			if ($result) {

                            doexec('delete from event_tag where id_event='.q($id));

                            $tag = $_POST['tag'];

                    

                            foreach($tag as $row_tag){

                                if (intval($row_tag)>0) {

                                    //simpan ke event_tag

                                    $simpanTag = array();

                                    $simpanTag['id_tag']   = $row_tag;

                                    $simpanTag['id_event']  = $id_event;

                                    doinsert('event_tag',$simpanTag);

                                } else {

                                    //simpan baru ke table tag

                                    $simpanTag = array();

                                    $simpanTag['nama_tag']       = $row_tag;                            

                                    doinsert('tag',$simpanTag);

                                    $id_tag = dogetlastid();



                                    //simpan ke product tag

                                    $simpanTag = array();

                                    $simpanTag['id_tag']       = $id_tag;

                                    $simpanTag['id_event']  = $id_event;

                                    doinsert('event_tag',$simpanTag);

                                }

                            }

                            

				redirect('index.php?go=event&do=ubah&id='.$id,'Data telah tersimpan');

			} else {
$_SESSION['temp_form'] = $_POST;
                            $_SESSION['pesan']      = '<strong>Terjadi Error!</strong> Gagal menyimpan';
                            $_SESSION['pesan_mode'] = 'warning';
			}

		}

		

		include_once($module.'/edit.php');

}

		

function hapus(){

	global $module,$config;

	

	$config['theme']='';

	

	$items = explode(',', rtrim($_POST['itemGroup'], ','));

    $num = 0; 

	

	foreach($items as $item){

		$result = dodelete($module,$item);

	}

	

	

	if ($result){

		echo 'Sukses menghapus data '.$_POST['itemGroup'];

	} else {

		echo 'Gagal menghapus data '.$_POST['itemGroup'];

	}

	

}



function detail(){

	global $module;

	include_once($module.'/detail.php');

}





?>