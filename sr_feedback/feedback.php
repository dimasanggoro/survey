<?php
switch ($_GET['act']) {
	default:

?>
<link href="assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />

<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>Feedback</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>
										<th class="table-checkbox">
											<input type="checkbox" class="group-checkable" data-set="#datatable_sample .checkboxes"/>
										</th>
										<th>id</th>
										<th>Location</th>
										<th>Poin</th>
										<th>Feedback</th>
										<th>Date/Time</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

</div>
					<!-- /PANEL -->

                    <!-- JAVASCRIPT FILES -->

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			    loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
						            "processing": true,
						            "serverSide": true,
									"stateSave": true,
						            "ordering": true, // Set true agar bisa di sorting
						            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
						            "ajax":
						            {
						                "url": "sr_feedback/view_feedback.php?module=feedback", // URL file untuk proses select datanya
						                "type": "POST",
						            },
						            "deferRender": true,
						            "aLengthMenu": [[10, 50, 100, 200, 999],[10, 50, 100, 200, 999]], // Combobox Limit
						            "columns": [
                                        { "data": "Survey_Id",
                                                    "render": function ( data, type, row, meta ) {
                                                        var fla = ""

                                                        fla = `<input type="checkbox" id="checka" class="deleteRow" name="fla" value="${row.id}">`;

                                                        return fla;
                                                        
                                                    }
                                        },	
						            	{ "data": "Survey_Id" },
										{ "data": "Lokasi_Nama"},
						                { "data": "Survey_Result"}, 
						                { "data": "Survey_Feedback"},
										{ "data": "Survey_Date"},
										{ "data": "Survey_Id",
                                                    "render": function ( data, type, row, meta ) {
                                                        var flaa = ""

                                                        flaa = `<a href="mediasmart.php?module=chat"><button class="btn btn-primary">Action</button></a>`;

                                                        return flaa;
                                                        
                                                    }
                                        },
						            ],
						});

						
					}

				});
			});
		</script>

<?php
	break;
		case "allfeedback":
?>


 <h1>disini feedback all</h1>

 <link href="assets/css/layout-datatables.css" rel="stylesheet" type="text/css" />

<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>All Feedback</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<table class="table table-striped table-bordered table-hover" id="datatable_sample">
								<thead>
									<tr>
										<th class="table-checkbox">
											<input type="checkbox" class="group-checkable" data-set="#datatable_sample .checkboxes"/>
										</th>
										<th>id</th>
										<th>Location</th>
										<th>Poin</th>
										<th>Feedback</th>
										<th>Option</th>
										<th>Date/Time</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									
								</tbody>
							</table>

						</div>
						<!-- /panel content -->

</div>
					<!-- /PANEL -->

                    <!-- JAVASCRIPT FILES -->

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			    loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){

					if (jQuery().dataTable) {

						var table = jQuery('#datatable_sample');
						table.dataTable({
						            "processing": true,
						            "serverSide": true,
									"stateSave": true,
						            "ordering": true, // Set true agar bisa di sorting
						            "order": [[ 0, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
						            "ajax":
						            {
						                "url": "sr_feedback/view_feedback.php?module=allfeedback", // URL file untuk proses select datanya
						                "type": "POST",
						            },
						            "deferRender": true,
						            "aLengthMenu": [[10, 50, 100, 200, 999],[10, 50, 100, 200, 999]], // Combobox Limit
						            "columns": [
                                        { "data": "Survey_Id",
                                                    "render": function ( data, type, row, meta ) {
                                                        var fla = ""

                                                        fla = `<input type="checkbox" id="checka" class="deleteRow" name="fla" value="${row.id}">`;

                                                        return fla;
                                                        
                                                    }
                                        },	
						            	{ "data": "Survey_Id" },
										{ "data": "Lokasi_Nama"},
						                { "data": "Survey_Result"}, 
										{ "data": "Survey_Feedback"},
										{ "data": "Option_Name"},
										{ "data": "Survey_Date"},
										{ "data": "Survey_Id",
                                                    "render": function ( data, type, row, meta ) {
                                                        var flaa = ""

                                                        flaa = `<a href="mediasmart.php?module=chat"><button class="btn btn-primary">Action</button></a>`;

                                                        return flaa;
                                                        
                                                    }
                                        },
						            ],
						});

						
					}

				});
			});
		</script>



<?php break;
	}
?>