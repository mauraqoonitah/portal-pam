<?php
	//global $module;
	
	$module=filter_inputnya($_GET['go']);
	$id		= $param['id'];
	$subid	= $param['subid'];
	$tipe 	= $param['tipe'];
	$posisi = $param['posisi'];
	$jenispustaka = $param['jenispustaka'];
	
	
	$data_induk = doquery('select * from vmenu where id='.$id);
	$row_induk = $data_induk[0];
	
	//query subid jika ada
	if (strlen($subid)>0){
		$data_subid = doquery('select * from vmenu where id='.$subid);
	}
	//query semua induk
	$sql = '
			select * from vmenu
			where level between 1 and '.$data_subid[0]['level'].' 
			and lft <='.$data_subid[0]['lft'].' 
			and rgt >= '.$data_subid[0]['rgt'].'
			order by lft';
	//echo $sql;
	
	if (strlen($subid)>0){
		$induk_selected_menu = doquery($sql);
		foreach($induk_selected_menu as $row_induk_selected){
			$arr_induk_selected[] = $row_induk_selected['id'];
		}
	}
	//debugvar($arr_induk_selected);
	
	$datakategori 	= doquery('select * from vmenu where lft between '.$row_induk['lft'].' and '.$row_induk['rgt'].' and published=1 order by lft asc');	
	//debugvar($datakategori);
		if ($posisi=='vertical') {
			
			$posisinya 	= 'art-vmenu';
			$kelas 		= '';
			//$kelas 		= '';
		} elseif ($posisi=='horizontal') {
			$posisinya 	= 'art-hmenu';
			$kelas 		= '';
		}
		$last_level = 0;
		$stack      = 0;
		$i = 0;
		$last_ul_level_id = 0;
		foreach($datakategori as $row){
			$i++;
			$level 	= $row['level'];
			$stackmenu = array();
 
			if ($last_level<$level){
			//jika level lama lebih kecil dari level baru
			//jika level baru lebih besar dari level lama
				if ($i==1) {
					echo '<ul class="'.$posisinya.'">';
					$stackmenu[] = '</ul>';
					echo '<li>';
					if ($subid==$row['id']){
						$kataktif = 'active';
					} else 	$kataktif = '';
					echo '<a class="'.$kataktif.'" href="'.$config['baseurl'].'index.php?go='.$module.'&do=list&id='.$id.'&subid='.$row['id'].'">'.$row['nama_category'].'</a>';
					$stackmenu[] = '</li>';
					
				} else if ($i==2){
					
					echo '<ul class="active">';
					//echo $row['id'];
					$stackmenu[] = '</ul>';	
					echo '<li>';
					if ($subid==$row['id']){
						$kataktif = 'active';
					} else 	$kataktif = '';
					echo '<a class="'.$kataktif.'" href="'.$config['baseurl'].'index.php?go='.$module.'&do=list&id='.$id.'&subid='.$row['id'].'">'.$row['nama_category'].'</a>';
					$stackmenu[] = '</li>';
					if (strlen($subid)>0)
						if (in_array($row['id'],$arr_induk_selected)){
							$last_ul_level_id = $row['id'];
						} else {
							$last_ul_level_id = 0;
						}
				} else {
					
					$cls_ul = '';
					if (strlen($subid)>0)
						//if (in_array($row['id'],$arr_induk_selected)){
						//	$last_ul_level_id = $row['id'];
						//} else {
						//	$last_ul_level_id = 0;
						//}
						if (in_array($last_ul_level_id,$arr_induk_selected)){
							$cls_ul = 'active';
						} 
					echo '<ul class='.$cls_ul.'>';
										
					$stackmenu[] = '</ul>';	
					echo '<li>';
					if ($subid==$row['id']){
						$kataktif = 'active';
					} else 	$kataktif = '';
					
					echo '<a class="'.$kataktif.'" href="'.$config['baseurl'].'index.php?go='.$module.'&do=list&id='.$id.'&subid='.$row['id'].'">'.$row['nama_category'].'</a>';
					$stackmenu[] = '</li>';
					if (strlen($subid)>0)
						
						if (in_array($row['id'],$arr_induk_selected)){
							$last_ul_level_id = $row['id'];
						} else {
							$last_ul_level_id = 0;
						}
					}
			} else if($last_level==$level) {					
					echo '</li>';
					echo '<li>';
					if ($subid==$row['id']){
						$kataktif = 'active';
					} else {
						$kataktif = '';
					}
					$last_ul_level_id = $row['id'];
					echo '<a class="'.$kataktif.'" href="'.$config['baseurl'].'index.php?go='.$module.'&do=list&id='.$id.'&subid='.$row['id'].'">'.$row['nama_category'].'</a>';					
			} else {
				//jika level yg lama lebih besar dari yg baru
				//atau level baru lebih kecil dari level lama
				$gap = $last_level - $level;
				for ($j=0;$j<$gap;$j++){
					echo '	</li>';
					echo '</ul>';
				}
				
				echo '</li>';
				echo '<li>';
				if (strlen($subid)>0)
						
						if (in_array($row['id'],$arr_induk_selected)){
							$last_ul_level_id = $row['id'];
						} else {
							$last_ul_level_id = 0;
						}
					
				if ($subid==$row['id']){
						$kataktif = 'active';
					} else {
						$kataktif = '';
					}
					echo '<a class="'.$kataktif.'" href="'.$config['baseurl'].'index.php?go='.$module.'&do=list&id='.$id.'&subid='.$row['id'].'">'.$row['nama_category'].'</a>';					
			}
				
			$last_level = $row['level'];
		
		}		
		for ($j=0;$j<$last_level;$j++){
			echo '	</li>';
			echo '</ul>';
		}
				
?>
