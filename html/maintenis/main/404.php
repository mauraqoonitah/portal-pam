<style>
IMG.displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }
</style>

<IMG class="displayed" src="<?php echo $config['baseurl'].'images/404.png'?>" alt="...">
<?php
	echo "<script>location.href='404.php';</script>";
?>