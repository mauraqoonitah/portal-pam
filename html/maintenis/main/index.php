<?php



//set title



session_start();



//$config['webtitle'] .= 'Administrator Panel';



$datamenu = doquery('select * from menu where menutype="adminiconmenu" and published=1 and level>0 order by lft asc');



?>


<style type="text/css">
    
    .box {



    height: 600px;



  



    overflow: auto;



    



}
</style>




<div class="row tile_count">



	<?php



		foreach($datamenu as $row){



	?>



	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">



		<div class="tile-stats">



			<a href="<?php echo $row['link']; ?>" class="features">



				<div class="count" align="center" style="padding:3px;">



					<img src="<?php echo '../images/header/'; ?><?php echo $config['logoheader']; ?>" style="vertical-align:baseline;" />



				</div>



				<div class="count-bottom" align="center">



					<strong><?php echo $row['title']; ?></strong>



				</div>



			</a>



		</div>



	</div>



<?php



}







$sqlstat = 'select 1 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=1 and year(waktu)=year(now())



union



select 2 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=2 and year(waktu)=year(now())



union



select 3 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=3 and year(waktu)=year(now())



union



select 4 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=4 and year(waktu)=year(now())



union



select 5 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=5 and year(waktu)=year(now())



union



select 6 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=6 and year(waktu)=year(now())



union



select 7 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=7 and year(waktu)=year(now())



union



select 8 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=8 and year(waktu)=year(now())



union



select 9 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=9 and year(waktu)=year(now())



union



select 10 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=10 and year(waktu)=year(now())



union



select 11 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=11 and year(waktu)=year(now())



union



select 12 as bulan, count(*) as banyak



from visitor_statistik



where month(waktu)=12 and year(waktu)=year(now())';







$datastat = doquery($sqlstat);



$arrstat  = array();



foreach($datastat as $rowstat){



	if($rowstat['banyak']==''){



		$bnyk = 0;



		$arrstat[] = (float)0;



	} else {



		$arrstat[] = (float)$rowstat['banyak'];



	}



}



$datastatjual = implode($arrstat,',');



//echo $datastatjual;



?>



</div>







<script type="text/javascript">



$(function () {



	var d = new Date();



	var thisYear = d.getFullYear();



	



        $('#container').highcharts({



            chart: {



                type: 'column',



                margin: [ 50, 50, 100, 80]



            },



            title: {



                text: 'Jumlah Pengunjung Per Bulan Tahun ' + thisYear



            },



            xAxis: {



                categories: [



                    'JAN',



                    'FEB',



                    'MAR',



                    'APR',



                    'MEI',



                    'JUN',



                    'JUL',



                    'AGU',



                    'SEP',



                    'OKT',



                    'NOV',



                    'DES'



                    



                ],



                labels: {



                    rotation: -45,



                    align: 'right',



                    style: {



                        fontSize: '13px',



                        fontFamily: 'Verdana, sans-serif'



                    }



                }



            },



            yAxis: {



                min: 0,



                title: {



                    text: 'PENGUNJUNG'



                }



            },



            legend: {



                enabled: false



            },



            tooltip: {



                formatter: function() {



                    return '<b>'+ this.x +'</b><br/>'+



                        'Jumlah per bulan tahun '+ thisYear+': '+ Highcharts.numberFormat(this.y, 1) +



                        ' ';



                }



            },



            series: [{



                name: 'Population',



                data: [<?php echo $datastatjual; ?>],



                dataLabels: {



                    enabled: true,



                    rotation: -90,



                    color: '#FFFFFF',



                    align: 'right',



                    x: 4,



                    y: 10,



                    style: {



                        fontSize: '13px',



                        fontFamily: 'Verdana, sans-serif'



                    }



                }



            }]



        });



    });



</script>



<div class="clearfix"></div>



<div class="clearfix"></div>



<div class="row">



	<div class="col-md-12 col-sm-12 col-xs-12">


<div class="box">
		<div class="dashboard_graph">



			<div class="row x_title">



				<div class="col-md-6">



					<h3>Grafik Pengunjung</small></h3>



				</div>



			</div>



				<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>	



		</div>



<?php



//$day=new DateTime('last day of this month'); 



$month_end = strtotime('last day of this month', time());



$tgl_akhir = date('d',$month_end);



//echo date('d-m-Y',$month_end);



//$sqlstat = '';



//for ($i=1;$i<$tgl_akhir;$i++){



//}



//$sqlstat = 'select 1 as bulan, count(*) as banyak



//			from visitor_statistik



//			where day(waktu)=1 and month(waktu)=1 and year(waktu)=year(now())';



?>		



    </div>
	</div>



</div>



<div class="clearfix" style="height:5px;"></div>



<div class="clearfix" style="height:5px;"></div>



<div class="clearfix" style="height:5px;"></div>



<div class="clearfix" style="height:5px;"></div>



<script src="<?php echo $config['baseurl'];?>res/highchart/highcharts.js"></script>



<script src="<?php echo $config['baseurl'];?>res/highchart/modules/exporting.js"></script>







