<h2>Daftar Produk</h2>
<?php

$dataproduct = doquery('select p.*,c.nama_category from ec_product p left join ec_category c on p.id_category=c.id order by ordering');
//$dataproduct = doquery('select * from ec_product order by ordering');
//$dbeditcat = doquery("select * from ec_category where id='".$id."'");
$rowcat = $dbeditcat[0];
?>

<?php
//jquery
?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-product').livequery(function(){
			$(this).dataTable({
		        "bJQueryUI"			: true,
		        "sPaginationType"	: "full_numbers",
				"iDisplayLength"	: 25,
		        "aoColumnDefs"		: [{ 'bSortable': false, 'aTargets': [ 0 ] }]
	    	});
		});
	});
	
	$(function(){
	
		//klik checkbox paling atas akan meng checked semua checkbox di bawah		
		$('#product-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='product-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='product-check\[\]']").livequery('click', function() {
			$('#product-checkAll').prop('checked', $("input[name='product-check\[\]']").length==$("input[name='product-check\[\]']:checked").length);
		
		});
		
		//supaya bisa klik checkbox
		$('tbody tr input:checkbox').livequery('click', function(e) {
    		e.stopPropagation();
		});

		//jika row diklik maka tampilkan data detail
		$('tbody tr[data-href]').addClass('clickable').livequery('click', function() { 
        	window.location = $(this).attr('data-href'); 
    	}); 		
		
		
		$('#deleteSelected').bind('click', function(){
			
			var nama_model = 'product';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=product&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='product-checkAll'){
						itemGroup = itemGroup +  $(this).val() +  ',';
						num++;
					}
            });

			if (itemGroup.length <= 0){
                    alert('Silakan pilih product yang ingin dihapus');
                    return false;
            }
			
			if (confirm('Anda yakin ingin menghapus record ini?')){
                $.post( baseUrl, {itemGroup: itemGroup}, function(msg){
						data: $(this).serialize()
						$(".ui-widget").html('<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>'+msg+'</p></div>');
						
						if (msg.indexOf('Sukses')>-1){
							$('input[type=checkbox]:checked').each(function(){
								$(this).parent().parent().remove();
							});
						}

                });
				return false;
        	}
		});
	});
</script>

<?php
	echo widgetbackend('actionmenuplain',array(
											'<a href="index.php?go=product&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=product&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
?>

<div class="demo_jui">

<table id="grid-product" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="product-checkAll"></th>
			<th>ID</th>
			<th>Kategori Image</th>
			<!--<th>Brand</th>
			<th>Product Code</th>	-->		
			<th>Judul Image</th>
			<!--<th>Logo</th>
			<th>Featured</th>
			<th>Published</th>
			<th>Product Price</th>-->
			<th>Image</th>
			<!--<th>Poster Promo</th>
			<th>Product Desc</th>
			<th>Product Weight (gr)</th>
			<th>Product L x W x H (cm)</th>-->
			<th>Date Created</th>
			<th>Action</th>
	</tr>
</thead>
<tbody>

		<?php
			$i = 0;
			foreach($dataproduct as $row){
			$i++;
		?>
			<tr data-href="index.php?go=product&do=detail&id=<?php echo $row['id']?>">
				<td style="text-align: center;"><input type="checkbox" name="product-check[]" id="product-check-<?php echo $i; ?>" value="<?php echo $row['id']?>"></td>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama_category']; ?></td>
				<!--<td><?php echo $row['brand']; ?></td>
				<td><?php echo $row['kode_product']; ?></td>-->
				<td><?php echo $row['nama_product']; ?></td>				
				<!--<td><img src="<?php echo $config['baseurl'] .'images/logobrand/'. $row['logobrand']; ?>" alt="" width="42"/></td>				
				<td><?php echo $row['featured']; ?></td>
				<td><?php echo $row['published']; ?></td>
				<td style="text-align: right;"><?php echo number_format($row['price'],0,',','.'); ?></td> -->
				<td><img src="<?php echo $config['baseurl'] .'images/products/'. $row['img_icon']; ?>" alt="" width="42" height="42" /></td>
				<!--<td><img src="<?php echo $config['baseurl'] .'images/poster/'. $row['imgpromo']; ?>" alt="" width="42" height="42" /></td>
				<td><?php echo $row['short_desc']; ?></td>
				<td><?php echo $row['weight']; ?></td>
				<td><?php echo $row['length'].' x '.$row['width'].' x '.$row['height']; ?></td>-->
				<td><?php echo $row['created']; ?></td>
				<td style="text-align: center;">
				<a href="index.php?go=product&do=ubah&id=<?php echo $row['id']?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			}
		?>

</tbody>
</table>
</div>
