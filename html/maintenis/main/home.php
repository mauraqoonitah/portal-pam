							<!--<div class="row">

								

                                <div class="col-lg-6 col-sm-6 col-xs-12">

                                    <div class="well with-header">

                                        <div class="header bordered-yellow"><i class="menu-icon fa fa-book"></i> Report Custom  </div>

                                        <div class="form-group">

                                            <div class="controls">

                                                <div class="input-group">

                                                    <span class="input-group-addon">

                                                        <i class="fa fa-calendar"></i>

                                                    </span><input type="text" id="reservation" class="form-control daterangepickers">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>-->

					<div class="row">

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">

						<div class="well with-header">

						<div class="header bordered-yellow"><i class="menu-icon fa fa-envelope"></i> CONTROL BOX  </div>

                        <div class="databox-xxlg databox-vertical  radius-bordered padding-5">

							<div>Hai <b>Administrator</b>, selamat datang di halaman Administrator.<br>	Silahkan klik menu pilihan untuk mengelola content.<br> <br> <br><br> </div>

							<div class="buttons-preview" align="center">

							

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-envelope-o"></i><br> SURAT MASUK </a>

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-envelope-o"></i><br> SURAT KELUAR </a>

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-envelope-o"></i><br> SURAT PERINTAH </a>

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-envelope-o"></i><br> SURAT KEPUTUSAN </a>

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-book"></i><br> LAPORAN </a>

                               <a href="javascript:void(0);" class="btn btn-default shiny"><i class="fa fa-cog"></i><br> KONFIGURASI </a>

							   

                            </div>

							<br>

							<br>

							<br>

							<br>

							<br>

							<br>

                        </div>

                        </div>

						</div>

						

						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">

							<div class="well with-header">

							<div class="header bordered-yellow"><i class="menu-icon fa fa-envelope"></i> 5 INPUT TERAKHIR</div>

											<div class="panel-group accordion" id="accordion">

                                                    <div class="panel panel-default">

                                                        <div class="panel-heading ">

                                                            <h4 class="panel-title">

                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#suratmasuk">

                                                                    SURAT MASUK

                                                                </a>

                                                            </h4>

                                                        </div>

                                                        <div id="suratmasuk" class="panel-collapse collapse in">

                                                            <div class="panel-body border-red">

                                                                <table class="table table-striped table-bordered table-hover" style="font-size:12px;">

																	<thead>

																	<tr>

																		<th>NO</th>

																		<th>NOMOR SURAT</th>

																		<th>TANGGAL SURAT</th>

																		<th>DARI</th>

																		<th>STAMP</th>

																		<th>ACTION</th>

																	</tr>

																	</thead>

																	<tbody>

															<?php

																$query_agenda_surat = mysqli_query("select * from agenda_surat_masuk order by id DESC limit 5");

																while($read_agenda_surat = mysqli_fetch_array($query_agenda_surat)){

															?>		

																	<tr>

																		<td><?php echo $read_agenda_surat['no_agenda_surat']; ?></td>

																		<td><?php echo $read_agenda_surat['no_surat']; ?></td>

																		<td><?php echo $read_agenda_surat['tanggal_surat']; ?></td>

																		<td><?php echo $read_agenda_surat['asal_surat']; ?></td>

																		<td><?php echo $read_agenda_surat['tanggal_terima_surat']; ?></td>

																		<td></td>

																	</tr>

																<?php } ?>

																	</tbody>

																</table>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="panel panel-default">

                                                        <div class="panel-heading">

                                                            <h4 class="panel-title">

                                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#suratkeluar">

																	SURAT KELUAR

                                                                </a>

                                                            </h4>

                                                        </div>

                                                        <div id="suratkeluar" class="panel-collapse collapse">

                                                            <div class="panel-body border-palegreen">

                                                               <table class="table table-striped table-bordered table-hover">

																	<thead>

																	<tr>

																		<th>NO</th>

																		<th>NOMOR SURAT</th>

																		<th>TANGGAL</th>

																		<th>PERIHAL</th>

																		<th>STAMP</th>

																		<th>ACTION</th>

																	</tr>

																	</thead>

																</table>

															</div>

                                                        </div>

                                                    </div>

                                                    <div class="panel panel-default">

                                                        <div class="panel-heading">

                                                            <h4 class="panel-title">

                                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#suratperintah">

                                                                    SURAT PERINTAH

                                                                </a>

                                                            </h4>

                                                        </div>

                                                        <div id="suratperintah" class="panel-collapse collapse">

                                                            <div class="panel-body border-magenta">

																<table class="table table-striped table-bordered table-hover">

																	<thead>

																	<tr>

																		<th>NO</th>

																		<th>NOMOR SURAT</th>

																		<th>TANGGAL SURAT</th>

																		<th>PELAKSANA</th>

																		<th>STAMP</th>

																		<th>ACTION</th>

																	</tr>

																	</thead>

																</table>

															</div>

                                                        </div>

                                                    </div>

													<div class="panel panel-default">

                                                        <div class="panel-heading">

                                                            <h4 class="panel-title">

                                                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#suratkeputusan">

                                                                    SURAT KEPUTUSAN

                                                                </a>

                                                            </h4>

                                                        </div>

                                                        <div id="suratkeputusan" class="panel-collapse collapse">

                                                            <div class="panel-body border-magenta">

																<table class="table table-striped table-bordered table-hover">

																	<thead>

																	<tr>

																		<th>NO</th>

																		<th>NOMOR SURAT</th>

																		<th>TANGGAL SURAT</th>

																		<th>PELAKSANA</th>

																		<th>STAMP</th>

																		<th>ACTION</th>

																	</tr>

																	</thead>

																</table>

															</div>

                                                        </div>

                                                    </div>

                                                </div>

						

					</div>

				</div>

				</div>

