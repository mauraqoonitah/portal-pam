<?php
$config['theme'] = '';
$id_prov = post('prov_id');
?>
									<select class="form-control" name="regency" id="regency" >
										<option value="">- Pilih Kota -</option>
										<?php 
											$datacity = doquery("select * from ec_city where prov_id='$id_prov' "); 
											foreach($datacity as $row_city){
												echo '<option value="'.$row_city['city_id'].'">'.$row_city['type'].' '.$row_city['city'].'</option>';
											}		
										?>
									</select>