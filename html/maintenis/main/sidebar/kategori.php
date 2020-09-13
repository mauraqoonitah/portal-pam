<script type="text/javascript">
$(document).ready(function() {
	$("#kategori").change(function(){
		$('#sub_kategori').fadeOut();
		$.post("?go=sidebar/subkategori", {
			parent_id: $('#kategori').val(),
		}, function(response){
			
			setTimeout("finishAjax('sub_kategori', '"+escape(response)+"')", 400);
		});
		return false;
	});
});
function finishAjax(id, response){
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
} 
</script>
<span class="input-text">Kategori Produk </span>
<div class="input-group row col-lg-12">

								<div class="col-lg-6">
                                            <select id="kategori" name="kategori" class="form-control" required>
											<option value="" selected="selected">- Pilih Kategori -</option>
											<?php 
												$query_kategori = doquery("select * from ec_category where level='1'");
												foreach($query_kategori as $kategori ){
											?>
												<option  value="<?php echo $kategori['id']; ?>"><?php echo $kategori['nama_category']; ?></option>
											<?php } ?>
                                                
                                            </select>
								</div>
								<div class="col-lg-6">
										<div id="sub_kategori"></div>		
								</div>
</div>