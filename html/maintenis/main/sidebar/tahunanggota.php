<div class="row">
<div class="col-lg-12"> 
<div class="col-lg-3"></div>  
	<!--
<div class="col-lg-2"> 
	
		<label><strong>Tahun</strong></label>
		<?php echo widgetbackend('tahunpicker',array('field'=>'tahun','value'=>date('Y'),'kosong'=>'- pilih -','start'=>'1970','class'=>'form-control')); ?>

</div>
		-->
<div class="col-lg-3">  
		<label><strong>Bulan</strong></label>
		<?php echo widgetbackend('bulanpickergaji',array('field'=>'bulan','value'=>date('m'),'kosong'=>'- pilih -')); ?>
</div>
<div class="col-lg-3"> 
		<br>
		<input type="submit" class="btn btn-success" id="load" value="Lihat">
		<?php if(get('go')=="renpol"){?>
		<input type="button" value="Export To Excel" id="export_excel" class="btn btn-primary">
		<?php }else{?>
		<input type="submit" class="btn btn-success" id="create_renpol" value="Buat Renpol">
		<?php } ?>
</div>
<div class="col-lg-1" align="left"><div id="notif"></div></div>  
</div>
</div>