<?php
//show news
$datanews = doquery('select * from content where title= "Selamat Datang"');
?> 
    <?php
	foreach($datanews as $news){
	?>
      	<span>
        <?php echo $news['intro_text']; 
        	  echo $news['full_text']; 
        
        ?>
        </span>
    <?php
	}
	?>
