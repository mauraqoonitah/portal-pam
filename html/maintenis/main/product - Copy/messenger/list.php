<h2>Daftar Akun Messenger</h2>
<?php

$datamessenger = doquery('select * from messenger order by ordering');

?>

<?php
//jquery
?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-messenger').livequery(function(){
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
		$('#messenger-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='messenger-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='messenger-check\[\]']").livequery('click', function() {
			$('#messenger-checkAll').prop('checked', $("input[name='messenger-check\[\]']").length==$("input[name='messenger-check\[\]']:checked").length);
		
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
			
			var nama_model = 'messenger';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=messenger&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='messenger-checkAll'){
						itemGroup = itemGroup +  $(this).val() +  ',';
						num++;
					}
            });

			if (itemGroup.length <= 0){
                    alert('Silakan pilih berita yang ingin dihapus');
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
											'<a href="index.php?go=messenger&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=messenger&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
?>

<div class="demo_jui">

<table id="grid-messenger" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="messenger-checkAll"></th>
			<th>Yahoo User</th>
			<th>User Name</th>
			<th>Published</th>
			<th>Date Created</th>
			<th>Action</th>
	</tr>
</thead>
<tbody>

		<?php
			$i = 0;
			foreach($datamessenger as $row){
			$i++;
		?>
			<tr data-href="index.php?go=messenger&do=detail&id=<?php echo $row['id']?>">
				<td style="text-align: center;"><input type="checkbox" name="messenger-check[]" id="messenger-check-<?php echo $i; ?>" value="<?php echo $row['id']?>"></td>
				<td><?php echo $row['ymuser']; ?></td>
				<td><?php echo $row['nmuser']; ?></td>
				<td><?php echo $row['published']; ?></td>
				<td><?php echo $row['created']; ?></td>
				<td style="text-align: center;">
				<a href="index.php?go=messenger&do=ubah&id=<?php echo $row['id']?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			}
		?>

</tbody>
</table>
</div>
