<h2>Daftar Data SIDEBAR</h2>
<?php

$data = doquery('select * from `sidebar` order by ordering');

?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-sidebar').livequery(function(){
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
		$('#sidebar-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='sidebar-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='sidebar-check\[\]']").livequery('click', function() {
			$('#sidebar-checkAll').prop('checked', $("input[name='sidebar-check\[\]']").length==$("input[name='sidebar-check\[\]']:checked").length);
		
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
			
			var nama_model = 'sidebar';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=sidebar&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='sidebar-checkAll'){
						itemGroup = itemGroup +  $(this).val() +  ',';
						num++;
					}
            });

			if (itemGroup.length <= 0){
                    alert('Silakan pilih data yang ingin dihapus');
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

<?php	echo widgetbackend('actionmenuplain',array(
											'<a href="index.php?go=sidebar&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=sidebar&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
?>
<div class="demo_jui">

<table id="grid-sidebar" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="sidebar-checkAll"></th>
				<th style="width: 50px;">ID</th>
				<th>NAMA</th>
				<th>WIDGET</th>
				<th>POSISI</th>
				<th>KETERANGAN</th>
				<th style="width: 100px;">PUBLISHED</th>
				<th style="width: 100px;">ORDERING</th>
			<th style="width: 100px;">Action</th>
	</tr>
</thead>
<tbody>

		<?php
			$i = 0;
			foreach($data as $row){
			$i++;
		?>
			<tr data-href="index.php?go=sidebar&do=detail&id=<?php echo $row['id']?>">
				<td style="text-align: center;width: 10px;"><input type="checkbox" name="news-check[]" id="news-check-" value="<?php echo $row['id']?>"></td>
				<td style="text-align:center;"><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['widget']; ?></td>
				<td><?php echo $row['posisi']; ?></td>
				<td><?php echo $row['keterangan']; ?></td>
				<td style="text-align: center;"><a href="?go=menu&id=<?php echo $row['id'];?>" class="switchpublished"><?php if ($row['published']=='1') echo '<a href="#"><img src="../images/tick.png">'; else echo '<img src="../images/warning.png">'; ?></a></td>
				<td style="text-align:center;"><?php echo $row['ordering']; ?></td>
				<td style="text-align: center;">
				<a href="index.php?go=sidebar&do=ubah&id=<?php echo $row['id']?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			}
		?>

</tbody>
</table>
</div>
