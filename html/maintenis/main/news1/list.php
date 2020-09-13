<h2>Daftar Berita</h2>
<?php

$datanews = doquery('select * from news order by ordering');

?>

<?php
//jquery
?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-news').livequery(function(){
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
		$('#news-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='news-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='news-check\[\]']").livequery('click', function() {
			$('#news-checkAll').prop('checked', $("input[name='news-check\[\]']").length==$("input[name='news-check\[\]']:checked").length);
		
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
			
			var nama_model = 'news';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=news&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='news-checkAll'){
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
											'<a href="index.php?go=news&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=news&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
?>

<div class="demo_jui">

<table id="grid-news" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="news-checkAll"></th>
			<th>News Title</th>
			<th>Intro Text</th>
			<th>Created by</th>
			<th>Published</th>
			<th>Date Created</th>
			<th>Action</th>
	</tr>
</thead>
<tbody>

		<?php
			$i = 0;
			foreach($datanews as $row){
			$i++;
		?>
			<tr data-href="index.php?go=news&do=detail&id=<?php echo $row['id']?>">
				<td style="text-align: center;"><input type="checkbox" name="news-check[]" id="news-check-<?php echo $i; ?>" value="<?php echo $row['id']?>"></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['intro_text']; ?></td>
				<td><?php echo $row['created_by']; ?></td>
				<td style="text-align: center;"><a href="?go=content&id=<?php echo $row['id'];?>" class="switchpublished"><?php if ($row['published']=='1') echo '<a href="#"><img src="../images/tick.png">'; else echo '<img src="../images/warning.png">'; ?></a></td>
				<td><?php echo $row['created']; ?></td>
				<td style="text-align: center;">
				<a href="index.php?go=news&do=ubah&id=<?php echo $row['id']?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php
			}
		?>

</tbody>
</table>
</div>
