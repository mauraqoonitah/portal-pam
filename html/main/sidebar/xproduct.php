<?php
 
//get data products
$dataproducts = doquery('select * from ec_product where published=1 and featured=1 order by id desc limit 3');

?>

<div class="messageBox"></div>

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script language="javascript">
	$('.messageBox').hide();
	$("#dialog-addtocart").dialog("open");
	function addToCart(id_product){
	    $.ajax({
	         type: "POST",
	         url: "<?php echo $config['baseurl']; ?>index.php?go=jx_add_cart",
	         data: "id_product=" + id_product,
	         success: function(msg){
			 			$('#cart').load("<?php echo $config['baseurl']; ?>index.php?go=sidebar/cart&do=show");	
						//$('.ui-widget').html(msg);	
						$('.messageBox').html(msg);
						$('.messageBox').show();
						$('.messageBox').fadeIn().delay(10000).fadeOut('slow'); 			
	                  }
	    });
	}
</script>


<div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-2" style="width: 100%" >
        <h4 style="text-align: left;"><span style="font-weight: bold; font-size: 18px;">FEATURED PRODUCTS</span></h4>
    </div>
    </div>
</div>
</div>


	
<div class="art-content-layout layout-item-4">
	<div class="art-content-layout-row">
		<?php
		foreach($dataproducts as $product) {
		?>
		<div class="art-layout-cell layout-item-5">
			
			<div>
				<a href="<?php echo $config['baseurl']; ?>index.php?go=product-detail&id=<?php echo $product['id'];?>">
				<p style="text-align: center;">
				<img img width="164" height="144" alt="" class="art-lightbox" alt="<?php echo $product['nama_product'];?>" src="<?php echo $config['baseurl']; ?>images/products/<?php echo $product['img_icon'];?>" alt="" width="120">
				</p>
				</a>
			</div>
			
			<p style="text-align: center;">
			<div style="font-weight: bold; font-size: 15px; color: #404040"> <?php 
       	//$logomerk='<img src="'.$config['baseurl'].'images/logobrand/'.$product['logobrand'].'" alt="'.$merk.'" height="20"> ';
         echo $product['brand']; ?></div>
				<a href="<?php echo $config['baseurl']; ?>index.php?go=product-detail&id=<?php echo $product['id'];?>"><?php echo $product['nama_product'];?></a>
			</p>
			
			<div> <?php echo $product['short_desc'];?> </div>
			<div style="display: block; font-weight: bold; color: #ee6100; margin-bottom: 2px;font-size: 15px; "> USD <?php echo number_format($product['price'],0,0,'.');?> </div><br />
			<!--<div class="cart">
				<input class="button" type="button" onclick="addToCart('<?php echo $product['id'];?>');" value="Add to Cart"
			</div>>-->
			<div class="fb-like" data-href="<?php echo $config['baseurl']; ?>index.php?go=product-detail&id=<?php echo $product['id'];?>" data-send="true" data-layout="button_count" data-width="100" data-show-faces="false"></div>						
			
		</div>
		<?
		}
		?>
	</div>
	<div class="txt2">
	<a class="art-button" href="index.php?go=product">lihat selengkapnya >></a>
	</div>
</div>



