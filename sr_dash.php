<?php
if ($_GET['module'] == 'home') { ?>

    <?php
         $query = mysqli_query($conn, "SELECT * FROM `graph_survey` WHERE `Lokasi_Id` = 'TP03' GROUP BY `time` DESC");
         $getdata = mysqli_fetch_array($query);
    ?>

<script type="text/javascript">
						$(document).ready(function(){
							// event textbox keyup 
							$("#pilihanpertama").change(function(){
								var strcari = $("#pilihanpertama").val();
								if (strcari != "") {
									// $("#sesudah").html("<img src='assets/load/loading.gif'/>")
									$("#sebelum").remove();
									//$("#plats > .controls > #inputText").removeAttr("required");
									//$("#plats > .controls > #inputText").removeAttr("name");
									//$("#namatamu").remove();
									//$("#notelps").remove();
									//$("#platse > .controls > #inputText").removeAttr("required");
									//$("#platse > .controls > #inputText").removeAttr("name");
									// $("#nomorvisitor").remove();
									//$("#platse > .controls > #inputText").removeAttr("required");
									//$("#platse > .controls > #inputText").removeAttr("name");
									$.ajax({
										type: "POST",
										url : "sr_graph/autofill_graph.php?module=pilihan_pertama",
										data: "one="+strcari,
										success: function(data){
											$("#sesudah").css("display","block");
											$("#sesudah").html(data);
										}
									});

                                    // console.log("ok");
									
								} else {
									// $("#hasil_plat").css("display","block");
									// $("#hasil_plattwo").css("display","block");
								}
							});

                            $("#pilihankedua").change(function(){
								var strcaridua = $("#pilihankedua").val();
								if (strcaridua != "") {
									// $("#sebelumkedua").html("<img src='assets/load/loading.gif'/>")
									$("#sebelumkedua").remove();
									//$("#plats > .controls > #inputText").removeAttr("required");
									//$("#plats > .controls > #inputText").removeAttr("name");
									//$("#namatamu").remove();
									//$("#notelps").remove();
									//$("#platse > .controls > #inputText").removeAttr("required");
									//$("#platse > .controls > #inputText").removeAttr("name");
									// $("#nomorvisitor").remove();
									//$("#platse > .controls > #inputText").removeAttr("required");
									//$("#platse > .controls > #inputText").removeAttr("name");
                                    // console.log(strcaridua);
									$.ajax({
										type: "POST",
										url : "sr_graph/autofill_graph.php?module=pilihan_kedua",
										data: "two="+strcaridua,
										success: function(data){
											$("#sesudahkedua").css("display","block");
											$("#sesudahkedua").html(data);
										}
									});

                                    // console.log("ok");
									
								} else {
									// $("#hasil_plat").css("display","block");
									// $("#hasil_plattwo").css("display","block");
								}
							});





						})
</script>

<!-- BOXES -->
<div class="row">

<!-- Feedback Box -->
<div class="col-md-4 col-sm-7">

    <!-- BOX -->
    <div class="box danger"><!-- default, danger, warning, info, success -->

        <div class="box-title"><!-- add .noborder class if box-body is removed -->
            
            <h4><a href="#">Feedback</a></h4>
            <small class="block">New Feedback</small>
            <i class="fa fa-comments"></i>
        </div>

        <!-- <div class="box-body text-center">
            <span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
                331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
            </span>
        </div> -->

    </div>
    <!-- /BOX -->

</div>

<!-- Profit Box -->
<div class="col-md-4 col-sm-7">

    <!-- BOX -->
    <div class="box warning"><!-- default, danger, warning, info, success -->

        <div class="box-title"><!-- add .noborder class if box-body is removed -->
            <h4>Send WA</h4>
            <small class="block">send WA for this month</small>
            <i class="fa fa-bar-chart-o"></i>
        </div>

        <!-- <div class="box-body text-center">
            <span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
                331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
            </span>
        </div> -->

    </div>
    <!-- /BOX -->

</div>

<!-- Orders Box -->
<div class="col-md-4 col-sm-7">

    <!-- BOX -->
    <div class="box default"><!-- default, danger, warning, info, success -->

        <div class="box-title"><!-- add .noborder class if box-body is removed -->
            <h4>Location</h4>
            <small class="block" style="visibility: hidden;">18 New Location</small>
            <i class="fa fa-shopping-cart"></i>
        </div>

        <!-- <div class="box-body text-center">
            <span class="sparkline" data-plugin-options='{"type":"bar","barColor":"#ffffff","height":"35px","width":"100%","zeroAxis":"false","barSpacing":"2"}'>
                331,265,456,411,367,319,402,312,300,312,283,384,372,269,402,319,416,355,416,371,423,259,361,312,269,402,327
            </span>
        </div> -->

    </div>
    <!-- /BOX -->

</div>


</div>
<!-- /BOXES -->

    <div class="panel panel-default">
        <div>
            <select id="pilihanpertama">
            <option>Lokasi Toilet Pria Lantai 3</option>
            <?php

                $querypilihan = mysqli_query($conn, "SELECT Lokasi_Nama, Lokasi_Id FROM sh_master_lokasi GROUP BY Lokasi_Nama");

                while ($bkl = mysqli_fetch_array($querypilihan)) {
            ?>
                <option value="<?php echo $bkl['Lokasi_Id'] ?>"><?php echo $bkl['Lokasi_Nama'] ?></option>
            <?php } ?>

            </select>
        
        </div>
        <div style="display: block; margin: 0 auto; text-align: center;">
                <h3>Y: Point & X: tgl/jam </h3>
        </div>
        
        <!-- panel content -->
        <div class="panel-body">
            <div id="sebelum">
            <div style="display: block; text-align: center;">
            <h4>Toilet Pria Lantai 3</h4>
            </div>
            <div id="flot-sales" class="fullwidth height-250"></div>
            </div>
            <div id="sesudah" style="display:none;">
        
            </div>
        </div>
        <!-- /panel content -->


    </div>

    <hr style="border: solid 5px;">

    <div class="panel panel-default">

        <div>
                <select id="pilihankedua">
                <option>Lokasi Toilet Pria Lantai 3</option>
                <?php

                    $querypilihan = mysqli_query($conn, "SELECT Lokasi_Nama, Lokasi_Id FROM sh_master_lokasi GROUP BY Lokasi_Nama");

                    while ($bkl = mysqli_fetch_array($querypilihan)) {
                ?>
                    <option value="<?php echo $bkl['Lokasi_Id'] ?>"><?php echo $bkl['Lokasi_Nama'] ?></option>
                <?php } ?>

                </select>
            
        </div>

        <div style="display: block; margin: 0 auto; text-align: center; margin-top: 30px;">
                    <h3>Jumlah Pemberi Feedback</h3>
        </div>
        

        <div class="panel-body">
                <div id="sebelumkedua"> 
                    <div style="display: block; text-align: center;">
                        <h4>Toilet Pria Lantai 3</h4>
                    </div>      
                    <div id="graph-stacked"></div>
                </div> 
                <div id="sesudahkedua" style="display: none;">
                </div>


        </div>
    
    
    </div>


<script type="text/javascript">
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
												<?php while ($b = mysqli_fetch_array($query)) { echo '[' . (strtotime($b['time']) * 1000) . ','. ($b['Survey_Result'] * 1000) .'],';}?>
                                                
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

                                                var valv = y;

                                                var re = new String(valv);

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

                                                // console.log(rep);

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

<script type="text/javascript">
			loadScript(plugin_path + "raphael-min.js", function(){
				loadScript(plugin_path + "chart.morris/morris.min.js", function(){

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
                                $querytwo = mysqli_query($conn, "SELECT * FROM `graph_survey_two` WHERE `Lokasi_Id`='TP03'");
                                while ($gratwo = mysqli_fetch_array($querytwo)) 

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

<?php } elseif ($_GET['module'] == 'feedback') {
    
        if (!empty($_SESSION['nama'])) {
        include("sr_feedback/feedback.php");
        } else {
        echo "<script type='text/javascript'>
                alert('Mohon maaf, Halaman Belum Tersedia !!');
                window.history.back();
              </script>";
        }

        } elseif ($_GET['module'] == 'inputob') {
          if (!empty($_SESSION['nama'])) {
            include("sr_inputob/inputob.php");
          } else {
            echo "<script type='text/javascript'>
                    alert('Mohon maaf, Halaman Belum Tersedia !!');
                    window.history.back();
                  </script>";
            }
        } elseif ($_GET['module'] == 'allfeedback') {
          if (!empty($_SESSION['nama'])) {
            include("sr_feedback/feedback.php?module=feedback&&act=allfeedback");
          } else {
            echo "<script type='text/javascript'>
                    alert('Mohon maaf, Halaman Belum Tersedia !!');
                    window.history.back();
                  </script>";
          }

} ?>



