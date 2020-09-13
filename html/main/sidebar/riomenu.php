<!--
ARTMENU VER 1.2 http:// dimenu sudah bisa dijalankan tanpa $config['baseurl']
-->


<?php
	$tipe 	= $param['tipe'];
	$posisi = $param['posisi'];
	
	$datamenu 	= doquery('select * from menu where level>0 and published=1 and menutype="'.$tipe.'" order by lft asc');	
	 $kelas='class="sub-menu"';
		if ($posisi=='vertical') {
			
			$posisinya 	= 'art-vmenu';
			$kelas 		= 'class="sub-menu active"';
			//$kelas 		= '';
		} elseif ($posisi=='horizontal') {
			$posisinya 	= 'menu';
			$kelas 		= 'class="sub-menu active"';
		}
		$last_level = 0;
		$stack      = 0;
		$i = 0;
		
		foreach($datamenu as $row){
			$i++;
			$level 	= $row['level'];
			$stackmenu = array();

			if ($last_level<$level){
			//jika level lama lebih kecil dari level baru
			//jika level baru lebih besar dari level lama
				if ($i==1) {
					echo '<ul id="nav" class="'.$posisinya.'">';
					$stackmenu[] = '</ul>';
					if (strpos($row['link'],"http:")>-1) {
					echo '<li><a href="'.$row['link'].'">'.$row['title'].'</a>';						
					}
					else {
					echo '<li><a href="'.$config['baseurl'].$row['link'].'">'.$row['title'].'</a>';
					}
					$stackmenu[] = '</li>';
					
				} else {
					echo '<ul '.$kelas.'>';
					$stackmenu[] = '</ul>';	
					if (strpos($row['link'],"http:")>-1) {
					echo '<li><a href="'.$row['link'].'">'.$row['title'].'</a>';						
					}
					else {
					echo '<li><a href="'.$config['baseurl'].$row['link'].'">'.$row['title'].'</a>';
					}
					$stackmenu[] = '</li>';
				}
			} else if($last_level==$level) {					
					echo '</li>';
					echo '<li>';
					if (strpos($row['link'],"http:")>-1) {
					echo '<li><a href="'.$row['link'].'">'.$row['title'].'</a>';						
					}
					else {
					echo '	<a href="'.$config['baseurl'].$row['link'].'">'.$row['title'].'</a>';
					}
										
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
				if (strpos($row['link'],"http:")>-1) {
					echo '<li><a href="'.$row['link'].'">'.$row['title'].'</a>';						
					}
					else {
					echo '	<a href="'.$config['baseurl'].$row['link'].'">'.$row['title'].'</a>';
					}				
			}
				
			$last_level = $row['level'];
		
		}		
		for ($j=0;$j<$last_level;$j++){
			echo '	</li>';
			echo '</ul>';
		}
				
?>
