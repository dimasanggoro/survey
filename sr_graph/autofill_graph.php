<?php
include ("../config/koneksi.php");
?>

<?php 

if($_GET['module'] == 'pilihan_pertama') {
	$id_qey =  $_POST['one'];
	$qlocone = mysqli_query($conn, "SELECT * FROM sh_master_lokasi WHERE Lokasi_Id = '$id_qey'");
	$gloc = mysqli_fetch_array($qlocone);
	$nmlokone = $gloc['Lokasi_Nama'];
?>


<script type="text/javascript">
			/* 
				Toastr Notification On Load 

				TYPE:
					primary
					info
					error
					success
					warning

				POSITION
					top-right
					top-left
					top-center
					top-full-width
					bottom-right
					bottom-left
					bottom-center
					bottom-full-width
					
				false = click link (example: "http://www.stepofweb.com")
			*/




			/** SALES CHART
			******************************************* **/
			loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
				loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
					loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
						loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
							loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
								loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
									loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){

										if (jQuery("#flot-sales").length > 0) {

											/* DEFAULTS FLOT COLORS */
											var $color_border_color = "#eaeaea",		/* light gray 	*/
												$color_second 		= "#6595b4";		/* blue      	*/


											var d = [
												<?php 
												
													$queryauto = mysqli_query($conn, "SELECT * FROM `graph_survey` WHERE `Lokasi_Id` = '$id_qey' GROUP BY `time` DESC");
													while ($b = mysqli_fetch_array($queryauto)) { echo '[' . (strtotime($b['time']) * 1000) . ','. ($b['Survey_Result'] * 1000) .'],';}?>
                                                
                                                ];
										
											for (var i = 0; i < d.length; ++i) {
												d[i][0] += 60 * 60 * 10;
											}
										
											var options = {

												xaxis : {
													mode : "time",
													tickLength : 5
												},

                                                yaxis : {
													mode : "number",
													tickLength : 5,
                                                    ticks: [[1000, "1"], [2000, "2"], [3000, "3"], [4000, "4"], [5000, "5"]]
                                                    
                                                },

												series : {
													lines : {
														show : true,
														lineWidth : 1,
														fill : true,
														fillColor : {
															colors : [{
																opacity : 0.1
															}, {
																opacity : 0.15
															}]
														}
													},
												   //points: { show: true },
													shadowSize : 0
												},

												selection : {
													mode : "x"
												},

												grid : {
													hoverable : true,
													clickable : true,
													tickColor : $color_border_color,
													borderWidth : 0,
													borderColor : $color_border_color,
												},

												tooltip : true,

												tooltipOpts : {
													content : getTooltip,
													dateFormat : "%y-%0m-%0d",
													defaultTheme : false
												},

												colors : [$color_second],
										
											};
										
											var plot = jQuery.plot(jQuery("#flot-sales"), [d], options);

                                            


                                            function getTooltip(label, x, y) {

                                                let unix_timestamp = x;

                                                let val = y;

												let re = new String(val);

                                                var rep = re.replace("000","");

                                                var datef = new Date(unix_timestamp); // ga perlu dikali 100 lagi karena sudah dikali 100 di array nya

                                                var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

                                                var year = datef.getFullYear();

                                                var month = months[datef.getMonth()];

                                                var date = datef.getDate();

                                                var hours = datef.getHours();
                                                // Minutes part from the timestamp
                                                var minutes = "0" + datef.getMinutes();
                                                // Seconds part from the timestamp
                                                var seconds = "0" + datef.getSeconds();
                                                // Will display time in 10:30:23 format
                                                var formattedTime = date + ' ' + month + ' / ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2) + ' ';

                                                // console.log(y);

                                                

                                                return "point pada tgl/jam:" + formattedTime + "adalah: " + rep; 
                                            }
										}

									});
								});
							});
						});
					});
				});
			});
			</script>
<div style="display: block; text-align: center;">
<h4><?php echo $nmlokone ?></h4>
</div>
<div id="flot-sales" class="fullwidth height-250"></div>


<?php } else if ($_GET['module'] == 'pilihan_kedua') {
	$id_qeytwo =  $_POST['two'];
	$qloctwo = mysqli_query($conn, "SELECT * FROM sh_master_lokasi WHERE Lokasi_Id = '$id_qeytwo'");
	$gloctwo = mysqli_fetch_array($qloctwo);
	$nmloktwo = $gloctwo['Lokasi_Nama'];
?>



<script type="text/javascript">
			loadScript(plugin_path + "./raphael-min.js", function(){
				loadScript(plugin_path + "./chart.morris/morris.min.js", function(){

					// demo js script
					/** 13. STACKED GRAPH
                    ******************************************* **/
                    if (jQuery('#graph-stacked').length > 0){ 
                        Morris.Bar({
                        element: 'graph-stacked',
                        axes: true,
                        grid: true,
                        data: [
                            
							<?php 
                                $queryfree= mysqli_query($conn, "SELECT * FROM `graph_survey_two` WHERE `Lokasi_Id`='$id_qeytwo'");
                                while ($gratwo = mysqli_fetch_array($queryfree)) 

                                { echo '{'.'x:'.'`'.$gratwo['DateQuarter'].'`'. ','.'a:'. $gratwo['a'] .','.'b:' . $gratwo['b'] . ','.'c:'. $gratwo['c'] . ','.'d:'. $gratwo['d'] .','.'e:'. $gratwo['e'] .'},';
                                
                                }?>
                        ],
                        xkey: 'x',
                        ykeys: ['a', 'b', 'c', 'd', 'e'],
                        labels: ['Point 0', 'Point 1', 'Point 2', 'Point 3', 'Point 4'],
                        stacked: true
                        });
                    }

				});
			});
		</script>

<div style="display: block; text-align: center;">
<h4><?php echo $nmloktwo ?></h4>
</div>
<div id="graph-stacked"></div>


	


<?php } ?>