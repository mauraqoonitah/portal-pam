<?php

	$tipe 	= $param['tipe'];

	$posisi = $param['posisi'];

	

	$datamenu 	= doquery('select * from menu where level>0 and published=1 and menutype="'.$tipe.'" order by lft asc');	

		if ($posisi=='vertical') {

			

			$posisinya 	= 'navitagion';

			$kelas 		= 'class="active"';

			//$kelas 		= '';

		} elseif ($posisi=='horizontal') {

			$posisinya 			= 'navigation';

			

			$classli		 	= 'has-sub';

			$aktif				= 'active';

			$kelas 				= '';

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

					echo '<ul>';

					$stackmenu[] = '</ul>';

					echo '<li><a  href="'.$row['link'].'">'.$row['title'].'</a>';

					$stackmenu[] = '</li>';

				} else {

					echo '<ul>';

					$stackmenu[] = '</ul>';	

					echo '<li><a   href="'.$row['link'].'">'.$row['title'].'</a>';

					$stackmenu[] = '</li>';

				}

			} else if($last_level==$level) {					

					echo '</li>';

					echo '<li class="'.$classli.'">';

					echo '	<a   href="'.$row['link'].'">'.$row['title'].'</a>';					

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

				echo '	<a  href="'.$row['link'].'">'.$row['title'].'</a>';					

			}

				

			$last_level = $row['level'];

		

		}		

		for ($j=0;$j<$last_level;$j++){

			echo '	</li>';

			echo '</ul>';

		}

				

?>

