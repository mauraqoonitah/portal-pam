<?php
//show Bank Account
$data = doquery('select * from bankacc where published="1" order by ordering');
?>

<div class="table">
<div class="table-heading"><font size="4" color="#cc6b0b">Bank Account</font></div>
	<div class="table-content">
	
<?php

foreach($data as $acc){
?>

<div class="kotak-radius">
<div class="txt2">
<img src="<?php echo $config['baseurl'] .'images/bank/'. $acc['img']; ?>"><br />
<font size="3"><b><?php echo $acc['name']; ?></b></font><br />	
<?php echo $acc['bankacc']; ?> Branch: <?php echo $acc['branch']; ?><br />
<b><?php echo $acc['accno']; ?></b>
<br/>

</div>
</div>

<?php
}
?>

	</div>	

</div>


