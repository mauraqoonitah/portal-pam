<?php
$config['theme'] = "";
$id_address = post('id_address');    

															$query_addr = doquery('select * from ec_address where id_address='.$id_address);
															foreach($query_addr as $data_addr){
																$data_country =  doGetDataById('ec_country',$data_addr['country'],'country_code'); 
																$data_city =  doGetDataById('ec_city',$data_addr['city'],'city_id');  
																$data_prov =  doGetDataById('ec_city',$data_addr['prov'],'prov_id');  
																$data_district =  doGetDataById('ec_subdistrict',$data_addr['sub_district'],'subdistrict_id');
														?>
														<input type="hidden"  value="<?php echo $data_addr['id_address'];?>" name="hid_address" id="hid_address">
														<table class="table cart-table">
														<tr>
														<td style="text-align:left;">
														<h5><b><?php echo $data_addr['name_address']; ?></b></h5> 
														<small><b>Receiver Name:</b></small>  <br> <?php echo $data_addr['receive_name']; ?> <br>
														<small><b>Phone:</b></small>  <br> <?php echo $data_addr['receive_phone']; ?> <br>
														</td>
														<td style="text-align:left;">
														<b>Delivery Address :</b><br><?php echo $data_addr['address']; ?><br>
															<div class="row">
																<div class="col-md-3"><small><b>Country:</b></small> <br>  <?php echo $data_country['country'];	?></div>
																<?php if($data_addr['country']=="236"){?>
																<?php
																	if($data_addr['sub_district']==""){
																?>
																	<input type="hidden" id="loc_user_type" name="loc_user_type" value="city">
																	<input type="hidden" id="loc_user" name="loc_user" value="<?php echo $data_addr['city']; ?>">
																<?php } else{ ?>
																	<input type="hidden" id="loc_user_type" name="loc_user_type" value="subdistrict">
																	<input type="hidden" id="loc_user" name="loc_user" value="<?php echo $data_addr['sub_district']; ?>">
																<?php } ?>
																<div class="col-md-3"><small><b>Province:</b></small> <br> <?php echo $data_prov['prov']; ?></div>
																<div class="col-md-3"><small><b>City:</b></small> <br> <?php echo $data_city['type']; ?> <?php echo $data_city['city']; ?></div>
																<div class="col-md-3"><small><b>District:</b></small> <br> <?php echo $data_district['subdistrict']; ?> </div>
																<?php }else{ ?>
																	<input type="hidden" id="loc_user" name="loc_user" value="<?php echo $data_addr['country']; ?>">
																<?php } ?>
															</div>
														</td>
														</tr>
														</table>
														<?php
															}
														?>