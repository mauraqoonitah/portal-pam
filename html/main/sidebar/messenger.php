<?php
//show messenger user
$data = doquery('select * from messenger where published="1" order by id');
?>

<div class="table">


	<div class="table-content">
	
<?php

foreach($data as $ym){
?>

<div class="kotak-radius">
<div class="txt2">
<div align="center">
<a href="ymsgr:sendIM?<?php echo $ym['ymuser']; ?>">
<img align="middle" border=0 src="http://opi.yahoo.com/online?u=<?php echo $ym['ymuser'];  ?>&m=g&t=9" /></a> 
 <br /><b><?php echo $ym['nmuser']; ?></b>
</div>


</div>
</div>

<?php
}
?>

	</div>
	
</div>