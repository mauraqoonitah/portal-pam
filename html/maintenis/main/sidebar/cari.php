<form class="art-search" method="POST" name="Search" action="<?php echo $config['baseurl'] . 'index.php?go=cari';?>">
   	<input type="text" name="keyword" value="<?php echo post('keyword');?>"><input type="hidden" name="cari" value="cari">
    <input type="submit" value="" name="search" class="art-search-button" value="Search">
</form>
