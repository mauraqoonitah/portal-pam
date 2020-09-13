<?php
$config['theme'] = '';
$id_city = post('city_id');
?>
									<select class="form-control" name="subdistrict" id="subdistrict" >
										<option value="">- Select Sub District -</option>
										<?php 
											$datasubdistrict = doquery("select * from ec_subdistrict where city_id='$id_city' "); 
											foreach($datasubdistrict as $row_subdistrict){
												echo '<option value="'.$row_subdistrict['subdistrict_id'].'">'.$row_subdistrict['subdistrict'].'</option>';
											}		
										?>
									</select>