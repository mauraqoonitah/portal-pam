<h2>Daftar Data STATUS PESANAN</h2>
<?php

$data = doquery('select * from `ec_order_status` order by id');

?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-status_pesanan').livequery(function(){
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
		$('#status_pesanan-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='status_pesanan-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='status_pesanan-check\[\]']").livequery('click', function() {
			$('#status_pesanan-checkAll').prop('checked', $("input[name='status_pesanan-check\[\]']").length==$("input[name='status_pesanan-check\[\]']:checked").length);
		
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
			
			var nama_model = 'status_pesanan';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=status_pesanan&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='status_pesanan-checkAll'){
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
											'<a href="index.php?go=status_pesanan&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=status_pesanan&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
?>
<div class="demo_jui">

<table id="grid-status_pesanan" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="status_pesanan-checkAll"></th>
				<th style="width: 50px;">ID</th>
				<th>NAMA STATUS</th>
			<th style="width: 100px;">Action</th>
	</tr>
</thead>
<tbody>

		<?php
			$i = 0;
			foreach($data as $row){
			$i++;
		?>
			<tr data-href="index.php?go=status_pesanan&do=detail&id=<?php echo $row['id']?>">
				<td style="text-align: center;width: 10px;"><input type="checkbox" name="news-check[]" id="news-check-" value="<?php echo $row['id']?>"></td>
				<td style="text-align:center;"><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama_status']; ?></td>
				<td style="text-align: center;">
				<a href="index.php?go=status_pesanan&do=ubah&id=<?php echo $row['id']?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			}
		?>

</tbody>
</table>
</div>
