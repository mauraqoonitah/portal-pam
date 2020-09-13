<h2>Daftar Data <?php echo str_replace('_',' ',strtoupper($namamodule)); ?></h2>
<?php echo "<?php\n"; ?>

$data = doquery('select * from `<?php echo $namatable;?>` order by ordering');

<?php echo "?>\n"; ?>

<script language="javascript">
	$(document).ready(function() {
	    $('#grid-<?php echo $namamodule;?>').livequery(function(){
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
		$('#<?php echo $namamodule;?>-checkAll').livequery('click',function() {
			var checked=this.checked;
			$("input[name='<?php echo $namamodule;?>-check\[\]']").each(function() {this.checked=checked;});		
		});
		
		//jika sudah checkAll kemudian menguncheck salah satu checkbox dibawah
		$("input[name='<?php echo $namamodule;?>-check\[\]']").livequery('click', function() {
			$('#<?php echo $namamodule;?>-checkAll').prop('checked', $("input[name='<?php echo $namamodule;?>-check\[\]']").length==$("input[name='<?php echo $namamodule;?>-check\[\]']:checked").length);
		
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
			
			var nama_model = '<?php echo $namamodule;?>';
            var itemGroup = '';
            var num = 0;
			var baseUrl = 'index.php?go=<?php echo $namamodule;?>&do=hapus';
			$('input[type=checkbox]:checked').each(function(){		
					if ($(this).attr('name')!='<?php echo $namamodule;?>-checkAll'){
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

<?php echo "<?php"; ?>	echo widgetbackend('actionmenuplain',array(
											'<a href="index.php?go=<?php echo $namamodule;?>&do=hapus" id="deleteSelected"><img src="../images/delete.png">Hapus</a>',
											'<a href="index.php?go=<?php echo $namamodule;?>&do=tambah" id="deleteSelected"><img src="../images/new.png">Tambah</a>',
												));
<?php echo "?>"; ?>

<?php
$sql ='SELECT distinct COLUMN_NAME, COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = "'.$namatable.'" AND table_schema = "'.$config['database'].'"';
$dataschema = doquery($sql);
?>
<div class="demo_jui">

<table id="grid-<?php echo $namamodule;?>" class="display" >
<thead>
	<tr>
			<th style="text-align: center;" ><input type="checkbox" id="<?php echo $namamodule;?>-checkAll"></th>
<?php 
			foreach($dataschema as $schema){
				if ($schema['COLUMN_NAME']=='id'){
					echo '				<th style="width: 50px;">'.strtoupper(str_replace('_',' ',$schema['COLUMN_NAME'])).'</th>'."\n";
				} else if ($schema['COLUMN_NAME']=='ordering' || $schema['COLUMN_NAME']=='published'){
					echo '				<th style="width: 100px;">'.strtoupper(str_replace('_',' ',$schema['COLUMN_NAME'])).'</th>'."\n";				
				} else {
					echo '				<th>'.strtoupper(str_replace('_',' ',$schema['COLUMN_NAME'])).'</th>'."\n";	
				}
				
			}
			?>
			<th style="width: 100px;">Action</th>
	</tr>
</thead>
<tbody>

		<?php echo "<?php\n"; ?>
			$i = 0;
			foreach($data as $row){
			$i++;
		<?php echo "?>\n"; ?>
			<tr data-href="index.php?go=<?php echo $namamodule;?>&do=detail&id=<?php echo "<?php"; ?> echo $row['id']<?php echo "?>"; ?>">
				<td style="text-align: center;width: 10px;"><input type="checkbox" name="news-check[]" id="news-check-<?php echo $i; ?>" value="<?php echo "<?php"; ?> echo $row['id']<?php echo "?>"; ?>"></td>
<?php 
				foreach($dataschema as $schema) {
					if ($schema['COLUMN_NAME']=='id' || $schema['COLUMN_NAME']=='ordering'){
						echo '				<td style="text-align:center;"><?php echo $row[\''.$schema['COLUMN_NAME'].'\']; ?></td>'."\n";	
					} else if ($schema['COLUMN_NAME']=='published') {
						echo '				<td style="text-align: center;"><a href="?go=menu&id=<?php echo $row[\'id\'];?>" class="switchpublished"><?php if ($row[\'published\']==\'1\') echo \'<a href="#"><img src="../images/tick.png">\'; else echo \'<img src="../images/warning.png">\'; ?></a></td>'."\n";	
					} else {
						echo '				<td><?php echo $row[\''.$schema['COLUMN_NAME'].'\']; ?></td>'."\n";
					}
					
					
				}
				?>
				<td style="text-align: center;">
				<a href="index.php?go=<?php echo $namamodule;?>&do=ubah&id=<?php echo "<?php"; ?> echo $row['id']<?php echo "?>"; ?>"><img src="../images/pencil.png" alt="Ubah" title="Ubah"></a></td>
			</tr>
		<?php echo "<?php\n"; ?>
			}
		<?php echo "?>\n"; ?>

</tbody>
</table>
</div>
