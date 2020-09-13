
<?php
$merk=get('brand');
$size=get('ukuran');

//echo 'merk '.$merk;
//echo 'ukuran '.$size;

$order	= get('order');
$sort 	= get('sort');
$kat 	= get('kat');

//sort berdasarkan harga
if (strlen($sort)>0){
	switch ($sort) {
		case 'termurah':
			$order = 'price asc';
			break;
		case 'termahal':
			$order = 'price desc';
			break;
		case 'terbaru':
			$order = 'id desc';
			break;
		case 'terlama':
			$order = 'id asc';
			break;
		default:
			$sort  = 'terbaru';
			$order = 'id desc';
			
	}
} else {
	$order = 'id desc';
	$sort  = 'terbaru';
}

$where = '';


if (strlen($kat)>0){
	$idkat = doquery('select lft,rgt from gal_category where nama_category_alias='.q($kat));
	$rowkat = $idkat[0];
	
	$dbkat = doquery('select id from gal_category where lft between '.$rowkat['lft'].' and '.$rowkat['rgt']);
	$in = '';
	foreach($dbkat as $rowkat){
		$in .= ','.$rowkat['id'];
	}
	$in = substr($in,1);
	$where .= ' and id_category in ('.$in.')';
}


	

//$brand=' and brand="'.$merk.'"';

if (strlen($merk)>0 AND strlen($size)>0){
$brand=' and brand="'.$merk.'"';
$ukuran=' and ukuran="'.$size.'"';
}
if (strlen($merk)>0){
$brand=' and brand="'.$merk.'"';
}
else{
$brand = '';
$ukuran = '';	
}

//hitung jumlah item
$sql_count = "select count(id) as banyak from gal_gallery where published=1 ".$where.$brand.$ukuran;
//echo $sql_count;
$reccount = doquery($sql_count);
$rowcount = $reccount[0]['banyak'];
//echo $rowcount;

//get page, per page tampilin 25
$perpage = 9;
if (isset($_GET['page'])){
	
	$page = get('page');
	$total_page = ceil($rowcount / $perpage);
	
	if ($page>$total_page){
		$page = $total_page;
	} else if ($page < 1 ){
		$page = 1;
	}
	$sql_limit = $perpage * ($page - 1).','.$perpage;
	
} else {
	$page = 1;
	$sql_limit = '0,'.$perpage;
}

$sql = 'select * from gal_gallery where published=1 '.$where.$brand.$ukuran.' order by '.$order. ' limit '.$sql_limit;
//echo $sql;
$dataproducts = doquery($sql);
$currentcount = count($dataproducts);

?>
<div class="messageBox"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script language="javascript">
	//$('.messageBox').hide();
$(function(){
	$(".filter").change(function(){
		//alert("test");
		var brand = '<?php echo $merk ?>';
		var ukuran = '<?php echo $size ?>';
		//alert(brand);
		//alert(ukuran);
		if (brand.length>0 && ukuran.length>0 ){
			brand = 'gallery/<?php echo $merk ?>/<?php echo $size ?>/index.html';
			}
		else if (brand.length>0){
			brand = 'gallery/<?php echo $merk ?>/index.html';
			} 
		else {
			brand = 'gallery';
		}
		
		var order = '?sort='+$('#filter').val();
		//var order = 'index.phpsort='+$('#filter').val();
		
		window.location.href="<?php echo $config['baseurl']; ?>"+brand+order; 
		
		//var order = '?sort='+$('#filter').val();
		//if (kat.length>0){
		//	kat = 'kat-<?php echo $kat ?>';
		//} else {
		//	kat = 'modul/product/';
		//}
		//var order = '?sort='+$('#filter').val();
		
		//window.location.href="<?php echo $config['baseurl']; ?>"+kat+order; 
	});
	
})
	

	function tampilkan(view) {
		
	/*	if (view == 'list') {
			$('.product-grid').attr('class', 'product-list');
			$('.product-panel').html('Tampilan <p><span id="list" class="list_on"></span><span id="grid" onclick="tampilkan(\'grid\');"></span></p>');
		} else {
			$('.product-list').attr('class', 'product-grid');					
			//$('.product-panel').html('');
			$('.product-panel').html('Tampilan <p><span id="list" onclick="tampilkan(\'list\');"></span><span id="grid" class="grid_on"></span></p>');
		} */
		$('#loader').load('<?php echo $config['baseurl'];?>index.php?go=jx_list_grid&tipelist=grid');
	}	
</script>


<!-- <div id="cart"><?php echo widget('cart');?></div> -->

<div class="product" style="padding: 15px 0px 0px 20px">

	
<div class="art-content-layout-wrapper layout-item-0">
<div class="art-content-layout layout-item-1">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-2" style="width: 100%" >
    
    
        <h4 style="text-align: left;"><span style="font-weight: bold; color: #4F5E63; font-size: 28px;">Gallery</span></h4>
    </div>
    </div>
</div>
</div>

		
		<div class="urut" style="margin-right: 0px"><label>Urut Berdasarkan: </label>
		<select name="filter" id="filter" class="filter">        
		<option value="terbaru" <?php if ($sort=='terbaru') echo ' selected="selected" '; ?>>Image Terbaru-Terlama</option>
		<option value="terlama" <?php if ($sort=='terlama') echo ' selected="selected" '; ?>>Image Terlama-Terbaru</option>
        </select>
		</div>

<?php
	//if ($_SESSION['tipelist']=='list'){
	//		$productlist = 'product-grid';
	//} else $productlist = 'product-list';
		$_SESSION['tipelist']=='list';
		$productlist = 'product-grid';
?>
		<div class="<?php echo $productlist; ?>">
		<?php
		foreach($dataproducts as $product) 
		{
		?>
		
		<div class="product-item">
		<div style="padding: 10px">
			
			<div class="image">
				<a href="<?php echo $config['baseurl']; ?>images/gallery/<?php echo $product['img_icon'];?>">
				<p style="text-align: center;">
				<img height="120" alt="" class="art-lightbox" alt="<?php echo $product['nama_image'];?>" src="<?php echo $config['baseurl']; ?>images/gallery/<?php echo $product['img_icon'];?>" alt="" width="120">
				</p>
				</a>
			</div>

			<div class="name">
				<?php echo $product['nama_image'];?>
			</div>			

			<div class="fb-like" data-href="<?php echo $config['baseurl']; ?>images/gallery/<?php echo $product['img_icon'];?>" data-send="true" data-layout="button_count" data-width="100" data-show-faces="false"></div>
			
		</div>
		</div>
		<?
		}
		?>
	</div>

<div style="margin-top: 50px">

<?php


// tampilin page nya
require( $config['basepath'].'main/inc/paging.class.php' ); 
$paging = new paging; 



if (strlen($sort)>0) {
$paging->assign ($config['baseurl'].str_replace('//','/', 'gallery/'.$merk.'/'.$size.'/index.html?sort='.$sort), $rowcount, $perpage  ); 
}

else{
$paging->assign ($config['baseurl'].str_replace('//','/', 'gallery/'.$merk.'/'.$size.'/index.html'), $rowcount, $perpage  ); 	 	
}

$paging->use_first_last  = true;

if ($rowcount<1)
{
echo "<div style='text-align:center; font-size:14px;'><p><br><br><br><br><br><br>";	
echo "<div style=' font-weight:bold; background-color:#E8E8E8; padding:5px'>Belum Ada Data</div>";	
echo "<br><br><br><br><br></p></div>";	
}

else {
	
echo $paging->fetch(); 
echo ' record: '.$currentcount.'/'.$rowcount;
}




?>
</div>


</div>
<p id="loader">&nbsp;</p>

