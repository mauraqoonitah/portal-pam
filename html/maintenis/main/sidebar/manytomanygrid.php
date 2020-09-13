<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo $config['baseurl'];?>themes-ui/smoothness/jquery-ui-1.8.4.custom.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/css/demo_page.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/css/demo_table_jui.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $config['baseurl'];?>res/DataTables/DataTables-1.10.10/css/jquery.dataTables.min.css" type="text/css" media="screen" />


<script type="text/javascript" src="<?php echo $config['baseurl'];?>res/DataTables/DataTables-1.10.10/js/jquery.dataTables.min.js"></script>-->
<!--Page Related Scripts-->
 <link href="<?php echo $config['baseurl'];?>assets/css/dataTables.bootstrap.css" rel="stylesheet" />
<?php
	$name 			= $param['name'];
	$nameid			= str_replace(' ','_',$name);
	$class			= $param['class'];
	$table_reference	= $param['table_reference'];	//nama table utk pilih value berbentuk dialog, misal: 'm_barang'
	$field_reference	= $param['field_reference'];	//nama field apa aja, misal: 'id, kode_barang, desbarang'
	$field_kode_reference	= $param['field_kode_reference'];	//nama field apa aja, misal: 'id, kode_barang, desbarang'
	$sql_reference		= $param['sql_reference'];
	//
	$field_grid		= $param['field_grid']; //field yg akan nampil di page
	$field_grid_class	= $param['field_grid_class']; //field yg akan nampil di page
	$data_default		= $param['data_default']; //tampilkan data dari db
	$banyak_data 		= count($data_default);
	$banyak_field_grid 	= count($field_grid);
	$bagian			= 400 / $banyak_field_grid;
	$disabled		= $param['disabled'];
        $label_button 		= $param['label_button'];
	//
?>

<style>
.style-hapus{
    text-decoration: line-through;
}
</style>

<script language="javascript">
	
	$(document).ready(function() {
		//jQuery(document).on('#gridlist-<?php echo $nameid;?>',function(){
		/*
		$('#gridlist-<?php echo $nameid;?>').dataTable({
		        "bJQueryUI"		: true,
		        "sPaginationType"	: "full_numbers",
			"iDisplayLength"        : 10,
		        "aoColumnDefs"		: [{ 'bSortable': false, 'aTargets': [ 0 ] }]
	    	});
	*/
		
		$('#<?php echo $nameid; ?>_dialog').hide();
		
                var banyakdata = <?php echo $banyak_data;?>;
                if (banyakdata==0) {
                    $('#gridutama-<?php echo $nameid; ?>').hide();
                }
		                
	});
	
	$(function() {
            $('#<?php echo $nameid; ?>_btnTambah').click(function(){
                //console.log('tes');
				bootbox.dialog({
					message: $("#<?php echo $nameid; ?>_dialog").html(),
				});
                //$('#<?php echo $nameid; ?>_dialog').dialog({width:800});
                return false;
            });			


            $(document).on('click','.hapus',function(){
                if (confirm('Anda yakin ingin menghapus baris ini?')) {
                    //jQuery(this).parent().parent().remove();	
                    $(this).parent().parent().attr('class', 'style-hapus');
                    $(this).parent().html('<input type="hidden" name="act[]" value="delete" />');
                }

                    return false;
            });
            
            
	});
	
	function pilih_item(kodeitem){
		//alert('tes');
		var field_references    = '<?php foreach($field_reference as $key=>$value) { $ref[]=$key; } echo implode($ref,","); ?>';
		var field_grids         = '<?php foreach($field_grid as $keygrid=>$valuegrid) { $refgrid[]=$keygrid; } echo implode($refgrid,","); ?>';
		
		var field_reference = field_references.split(',');
		var field_grid 		= field_grids.split(',');
		
		var jumlah_row_awal	= $('#jumlah_row').val();
		var jumlah_row		= parseInt(jumlah_row_awal) + 1;
		var items = '';

		items += '<tr>';
		items += '  <td style="text-align: center;"><a href="#" class="hapus" ><img src="<?php echo $config["baseurl"];?>images/trash.gif" alt="Hapus" title="Hapus" /></a><input type="hidden" name="act[]" value="add" /></td>';
		for (var h = 0; h < field_grid.length; h++) {
			var matching = false;
			
			for (var i = 0; i < field_reference.length; i++) {
				//siapkan row yang akan ditambahkan
				//alert(field_reference[i]+'_'+kodeitem);
				//cek apakah nama field sama atau tidak
				
			    if (field_grid[h]==field_reference[i]){
					var value_field_match = $('#'+field_reference[i]+'_'+kodeitem).val();
					var nama_field_match  = field_reference[i];
					items += '	<td><input type="hidden" name="detail_'+nama_field_match+'[]" value="'+value_field_match+'" />'+value_field_match+'</td>';	
					matching = true;
				} 
				
			}
			if (matching==false){
				var field_id		= field_grid[h].replace(" ","_");
				items += '  <td style="text-align: center"><input type="text" name="detail_'+field_grid[h]+'[]" required="required" style="text-align: center;width: <?php echo $bagian;?>px;" id="<?php echo $nameid; ?>_'+field_id+'_'+jumlah_row+'" class="<?php echo $field_grid_class; ?>" /></td>';
			}
		}
		items += '</tr>';
		$('#itemlist').append(items);
		$('#jumlah_row').val(jumlah_row);
		bootbox.hideAll()
		//$('#<?php echo $nameid; ?>_dialog').dialog('close');
                $('#gridutama-<?php echo $nameid; ?>').show();
                
		return false;
	}
</script>

<?php
    if (strlen($sql_reference)>0){
            $data_reference = doquery($sql_reference);	
    } else {
            $data_reference = doquery('select * from '.$table_reference);
    }	
?>
<p><button class="btn btn-primary" id="<?php echo $nameid; ?>_btnTambah" <?=$disabled?>><i class="icon-white icon-plus"></i> <?php echo $label_button; ?></button></p>
<input  type="hidden" id="jumlah_row" value="<?php echo $banyak_data;?>"/>
<table id="gridutama-<?php echo $nameid; ?>" class="table table-bordered table-hover table-striped" >
<thead>
    <tr>
	<th style="width:20px;">&nbsp;</th>
    <?php 
    foreach($field_grid as $field_row=>$field_ket){
            echo '<th>'.$field_ket.'</th>';
    }
    ?>

    </tr>
</thead>
<tbody id="itemlist">
<?php
//for ($i=0;$i<$banyak_data-1;$i++){
	
	$jumlah_row = 0;
	if (count($data_default)>0){
	
	
	foreach($data_default as $row_data){
		$jumlah_row++;
		echo '<tr>';
		echo '   <td style="text-align: center;">';
		if($disabled==''){
				echo '<a href="#" class="hapus" ><img src="'.$config["baseurl"].'images/trash.gif" alt="Hapus" title="Hapus"/></a>';
		}
		echo '<input type="hidden" name="act[]" value="update" /></td>';	
		foreach($field_grid as $field_grid_row=>$field_grid_ket){
			$matching = false;
			foreach($field_reference as $field_ref_row=>$field_ref_ket){
				
				if ($field_ref_row==$field_grid_row){
					$nama_field 	= $field_grid_row;
					$nama_field_id	= str_replace(' ','_',$nama_field);
					$ket_field 		= $field_grid_ket;
					$value_field 	= $row_data[$nama_field];
					$idnya			= $row_data[$field_kode_reference];
					$matching = true;	
				}
			}
			if ($matching){
				echo '<td>'.$value_field.'<input type="hidden" name="detail_'.$nama_field.'[]" value="'.$value_field.'" /></td>';
			} else {
				//debugvar($row_data);
				echo '<td style="text-align: center"><input type="text" name="detail_'.$field_grid_row.'[]" value="'.$row_data[$field_grid_row].'" style="text-align: center;width: '.$bagian.'px" id="'.$nameid.'_'.$nama_field_id.'_'.$jumlah_row.'"  class="'.$field_grid_class.'" '.$disabled.'  /></td>';
			}
		}
		echo '</tr>';
	}
	
	}
	
//}
?>
</tbody>

</table>

<div id="<?php echo $nameid; ?>_dialog" style="display:none;">
<table id="gridlist-<?php echo $nameid;?>" class="table table-bordered table-hover table-striped"  style="font-size:12px;" >
<thead>
	<tr>
	<?php 
	foreach($field_reference as $field_row=>$field_ket){
		echo '<th>'.$field_ket.'</th>';
	}
	?>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	
	<?php 
	$j = 0;
	foreach($data_reference as $row){
		echo '<tr>';
		$i = 0;
		foreach($field_reference as $field_row=>$field_ket){
			
			
			echo '<td><input id="'.$field_row.'_'.$j.'" type="hidden" value="'.$row[$field_row].'" />'.$row[$field_row].'</td>';
		?>
		<?php
		}
		$i++;
		?>
		<td><a href="#" title="Pilih" onclick="pilih_item('<?php echo $j; ?>'); return false;"><i class="icon-ok"></i> Pilih</a>
		</td>
	</tr>
	<?php
	$j++;
	}
	?>
		
	
</tbody>
</table>
</div>
 <!--Page Related Scripts-->
    <script src="<?php echo $config['baseurl'];?>assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/datatable/ZeroClipboard.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="<?php echo $config['baseurl'];?>assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script>
        $('#gridlist-<?php echo $nameid;?>').dataTable({
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "aaSorting": [[1, 'asc']],
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"]
                ],
                "iDisplayLength": 10,
                "oTableTools": {
                    "aButtons": [
                        "copy",
                        "print",
                        {
                            "sExtends": "collection",
                            "sButtonText": "Save <i class=\"fa fa-angle-down\"></i>",
                            "aButtons": ["csv", "xls", "pdf"]
                        }
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "language": {
                    "search": "",
                    "sLengthMenu": "_MENU_",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                }
            });
    </script>