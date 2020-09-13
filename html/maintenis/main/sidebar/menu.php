<ul class="clearfix l_tinynav1" id="navlist">
                    <!--Dashboard-->
                    <li class="active">
                        <a href="index.php">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
					<?php               
						$main=mysql_query("SELECT * FROM mainmenu");
						while($r=mysql_fetch_array($main)){
							echo "<li >
									<a data-rel='$r[nama_menu]' href='$r[link]'>$r[nama_menu]</a>
										<div class='ddsubmenustyle' style='z-index: 2000; left: 0px; top: -1000px; visibility: hidden;'>
											<ul id='$r[nama_menu]' data-href='#' style='visibility: hidden;'>";
												$sub=mysql_query("SELECT * FROM submenu, mainmenu  
												WHERE submenu.id_main=mainmenu.id_main 
												AND submenu.id_main=$r[id_main] AND submenu.id_submain=0");
												while($w=mysql_fetch_array($sub)){
													echo "<li>
															<a href='$w[link_sub]'>$w[nama_sub]</a>";
																$sub2 = mysql_query("SELECT * FROM submenu WHERE id_submain=$w[id_sub] AND id_submain!=0");
																$jml2=mysql_num_rows($sub2);
																	if ($jml2 > 0){
																		echo "<ul>";
																			while($s=mysql_fetch_array($sub2)){
																				echo "<li><a href='$s[link_sub]'>$s[nama_sub]</a></li>";
																			}
																		echo "</ul>";
																	}
													echo "</li>";
												}
											echo "</ul>";
							echo " </li>";
						}        
					?>
                </ul>