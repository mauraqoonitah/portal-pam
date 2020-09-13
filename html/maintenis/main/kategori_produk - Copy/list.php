<h2 class="art-postheader">Daftar Kategori Produk</h2>
<br/>

<?php

$module = 'kategori_produk';
$moduledb = 'ec_category';

$sql = 'select * from '.$moduledb.' '.$where.' order by lft';
$datamenu = doquery($sql);

?>
<script language="javascript">
	$(document).ready(function() {
	    $('#menu-grid').livequery(function(){
			$(this).dataTable({
		        "bJQueryUI"			: true,
		        "sPaginationType"	: "full_numbers",
				"iDisplayLength"	: 25,
		        "aoColumnDefs"		: [{ 'bSortable': false, 'aTargets': [ 0 ] }]
	    	});
		});
	});
	
	$(function(){
	
		$('#pilihanmenu').change(function(){
			window.location = 'index.php?go=<?php echo $module; ?>&tipe='+$(this).val();
		});
		
		//klik checkbox paling atas akan meng checked semua checkbox di bawah		
		$('#menu-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='menu-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='menu-check\[\]']").livequery('click', function() {
			$('#menu-checkAll').prop('checked', $("input[name='menu-check\[\]']").length==$("input[name='menu-check\[\]']:checked").length);
		
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
			
			var nama_model = 'kategori_produk';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=<?php echo $module; ?>&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='menu-checkAll'){
						itemGroup = itemGroup +  $(this).val() +  ',';
						num++;
					}
            });

			if (itemGroup.length <= 0){
                    alert('silakan pilih yang ingin dihapus');
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
								'<a href="index.php?go=<?php echo $module; ?>&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
								'<a href="index.php?go='.$module.'&do=tambah" ><img src="../images/new.png">Tambah</a>',
												));
?>

<div class="demo_jui">

<table id="menu-grid" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="menu-checkAll"></th>
			<th>Nama Kategori</th>
			<th>Nama Kategori Alias</th>
			<th>Ordering</th>
			<th>Published</th>
			<th>Action</th>		
	</tr>
</thead>
<tbody>
				
		<?php
			$i = 0;
			foreach($datamenu as $row){
			$i++;
		?>
			<tr data-href="index.php?go=<?php echo $module; ?>&do=detail&id=<?php echo $row['id']?>&tipe=<?php echo $tipe; ?>">
				<td style="text-align: center;"><input type="checkbox" name="menu-check[]" id="menu-check-<?php echo $i; ?>" value="<?php echo $row['id']?>"></td>
				<td><?php echo str_repeat('--',$row['level']) . $row['nama_category']; ?></td>
				<td><?php echo $row['nama_category_alias']; ?></td>
				
				
				<td style="text-align: center;"><a href="<?php echo $config['baseurl']; ?>backend/index.php?go=<?php echo $module; ?>&do=turunkan&id=<?php echo $row['id']?>" alt="turunkan" title="turunkan"><img src="<?php echo $config['baseurl']; ?>images/down.png"  alt="turunkan" title="turunkan"/></a> <a href="<?php echo $config['baseurl']; ?>backend/index.php?go=<?php echo $module; ?>&do=naikkan&id=<?php echo $row['id']?>;?>"><img src="<?php echo $config['baseurl']; ?>images/up.png"  alt="naikkan" title="naikkan"/></a></td>
				<td style="text-align: center;"><a href="?go=<?php echo $module; ?>&id=<?php echo $row['id'];?>" class="switchpublished"><?php if ($row['published']=='1') echo '<a href="#"><img src="../images/tick.png">'; else echo '<img src="../images/warning.png">'; ?></a></td>
				<td style="text-align: center;">
				<a href="index.php?go=<?php echo $module; ?>&do=ubah&id=<?php echo $row['id']?>&tipe=<?php echo $tipe; ?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			//$old_lft = $row['lft'];
			//$old_rgt = $row['rgt'];
			}
		?>
		
</tbody>
</table>
</div>
