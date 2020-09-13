<?php

	$tipe 	= $param['tipe'];

	$posisi = $param['posisi'];

	

	$datamenu 	= doquery('select * from menu where level>0 and published=1 and menutype="'.$tipe.'" order by lft asc');	

		if ($posisi=='vertical') {

			

			$posisinya 	= 'nav side-menu';

			$kelas 		= 'class="nav child_menu"';

			//$kelas 		= '';

		} elseif ($posisi=='horizontal') {

			$posisinya 	= 'art-hmenu';

			$kelas 		= '';

		}

		$last_level = 0;

		$stack      = 0;

		$i = 0;


		foreach($datamenu as $row){

			$i++;

			$level 	= $row['level'];

			$stackmenu = array();

		

			$induk = $row['rgt'] - $row['lft'];

					if ($induk>1) {

						$icon ="glyphicon glyphicon-plus"; 

					}else{

						$icon ="glyphicon glyphicon-pushpin"; 



					}



			if ($last_level<$level){

			//jika level lama lebih kecil dari level baru

			//jika level baru lebih besar dari level lama

				if ($i==1) {

					echo '<ul class="'.$posisinya.'">';

					$stackmenu[] = '</ul>';

				
if ($row['role']!=$_SESSION['roleid']) {
	
}if($row['role']==$_SESSION['roleid'] || $row['role']==3){

					echo '<li><a href="'.$row['link'].'"><span class="'.$icon.'" aria-hidden="true"></span> '.$row['title'].'  </a>';
}



					$stackmenu[] = '</li>';

				} else {

					echo '<ul '.$kelas.' style="display: none">';
if ($row['role']!=$_SESSION['roleid']) {
	
}if($row['role']==$_SESSION['roleid'] || $row['role']==3){

					$stackmenu[] = '</ul>';	

					echo '<li><a href="'.$row['link'].'"><span class="'.$icon.'" aria-hidden="true"></span>'.$row['title'].' </a>';
}

					$stackmenu[] = '</li>';

				}

			} else if($last_level==$level) {					

					echo '</li>';

if ($row['role']!=$_SESSION['roleid']) {
}if($row['role']==$_SESSION['roleid'] || $row['role']==3){
					echo '<li>';
	
					echo '	<a href="'.$row['link'].'"><span class="'.$icon.'" aria-hidden="true"></span> '.$row['title'].' </a>';					

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

if ($row['role']!=$_SESSION['roleid']) {
	
}if($row['role']==$_SESSION['roleid'] || $row['role']==3){
				echo '<li>';
				echo '	<a href="'.$row['link'].'"><span class="'.$icon.'" aria-hidden="true"></span> '.$row['title'].'</a>';					

}
			}

				

			$last_level = $row['level'];

		

		}		

		for ($j=0;$j<$last_level;$j++){

			echo '	</li>';

			echo '</ul>';

		}

				

?>

