<?php
$config['theme'] = '';
$country = post('country');
if($country == "236"){
?>
								<div class="input-group">
									<span class="input-group-addon"><span class="input-text">Province </span></span>
									<select name="province" id="province" class="form-control">
										<option value="">- Select Province -</option>
										<?php  
											$dataprov = doquery('select * from ec_prov '); 
											foreach($dataprov as $row_prov){
												echo '<option value="'.$row_prov['id_prov'].'">'.$row_prov['prov_name'].'</option>';
											}		
										?>
									</select>
								</div> 
								<div class="input-group">
									<span class="input-group-addon"><span class="input-text">Regency </span></span>
									<div id="city_load">
										<select class="form-control" disabled="disabled">
											<option value="">- Select Regency -</option>
										</select>
									</div>
								</div>
								<div class="input-group">
									<span class="input-group-addon"><span class="input-text">Sub District </span></span>
									<div id="subdist_load">
										<select class="form-control" disabled="disabled">
											<option value="">- Select Sub District -</option>
										</select>
									</div> 
								</div> 
								
								<br>
<?php
}
?>