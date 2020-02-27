<?php 
include ("config/koneksi.php");
$aksi = "sr_inputob/aksi_inputob.php";

function acakangkahuruf($panjang) {
	$karakter = '123456789';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
	  $pos = rand(0, strlen($karakter)-1);
	  $string .= $karakter{$pos};
	}
	return $string;
  }

  $acak2 = acakangkahuruf(4);
  $nounikid = 'SEC'.$acak2;

function acakangkahurufob($panjangob) {
	$karakterob = '123456789';
	$stringob = '';
	for ($i = 0; $i < $panjangob; $i++) {
	  $posob = rand(0, strlen($karakterob)-1);
	  $stringob .= $karakterob{$posob};
	}
	return $stringob;
  }

  $acak2ob = acakangkahuruf(4);
  $nounikidob = 'OB'.$acak2;

?>
<script src="plugin/webcam.min.js"></script>
<script type="text/javascript" src="plugin/jquery-clockpicker.min.js"></script>
<link rel="stylesheet" href="plugin/jquery-clockpicker.min.css">
<h4>Register Office Boy</h4>
<section>
		<div class="box box-primary">
			<form id="form1" method="POST" action="<?php echo "$aksi?module=saveob" ?>" enctype="multipart/form-data" style="padding: 10px;">
				<div class="row">
					<div class="col-lg-6 col-xs-12">
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="exampleInputEmail1">ID Office Boy</label>
									
									<input class="form-control" name="idob" value="<?php echo $nounikidob ?>" id="noinda" placeholder="ID Project" readonly/></label>
								</div>
							</div>

							<div class="col-lg-3">

								<label for="exampleInputEmail1">Jenis ID</label>
											<select id="targetpsta" class="form-control" name="jenis_id">
														<option value="KTP">KTP</option>
														<option value="SIM">SIM</option>		
											</select>
							
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="exampleInputEmail1">Nomor ID</label>
									<input class="form-control" name="nomor_id" placeholder="nomor kartu id">
								</div>
							</div>
							
						</div>

						<div class="row">
							<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Office Boy</label>
										<input name="nama_ob" class="form-control" id="noindb" placeholder="Nama Office Boy" required>
									</div>
							</div>

							<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Cabang</label>
										<select id="targetpstb" class="form-control" name="cabang">
										<option>~ Isi Cabang ~</option>
												<?php

													$query = mysqli_query($conn, "SELECT Location_Name FROM employee_all GROUP BY Location_Name");
							
													while ($bkl = mysqli_fetch_array($query)) {
												?>
													<option value="<?php echo $bkl['Location_Name'] ?>"><?php echo $bkl['Location_Name'] ?></option>
												<?php } ?>		
											</select>
							
									</div>
							</div>
						
						
						</div>

						<div class="row">
							<div>  
								<div class="col-lg-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Tgl Lahir Office Boy</label>
										<input type="date" name="tanggal_lahir" class="form-control" id="noindc" placeholder="Nama Security" required>
									</div>
								</div>

								

								<div class="col-lg-6">
									<label for="exampleInputEmail1">Jenis Kelamin</label>
											<select id="targetpstc" class="form-control" name="jenis_kelamin">
														<option value="laki-laki">Laki-Laki</option>
														<option value="perempuan">Perempuan</option>		
											</select>
								
								</div>


								
							</div> 
						</div>


						<div class="row">
								<div class="col-lg-12">
									<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">alamat tempat tinggal</label>
											<input name="alamat_tempat_tinggal" class="form-control" placeholder="alamat tempat tinggal">
										</div>
								</div>
						</div>

						<div class="row">
								<div class="col-lg-3">
										<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">No Telp (WA)</label>
											<input name="no_telp" class="form-control" placeholder="No Telp">
										</div>


								</div>

								<div class="col-lg-2">
										<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">Login Aplikasi</label>
											<select id="targetpstd" class="form-control" name="is_app">
												<option value="ya">Ya</option>
												<option value="tidak">Tidak</option>												
											</select>
										</div>


								</div>

								<div class="col-lg-4">
										<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">Email</label>
											<input name="email" class="form-control" placeholder="Email">
										</div>


								</div>

								<div class="col-lg-3">
									<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">Akhir Masa Kontrak</label>
											<input name="akhir_kontrak" type="date" class="form-control" placeholder="Masa Kontrak Selesai">
										</div>


								</div>
                                <div class="col-lg-3">
									<div class="form-group" id="jenkar">
											<label for="exampleInputEmail1">Jadwal</label><br>
                                            <label for="exampleInputEmail1">Jam</label>
											<input name="jadwaljam" type="text" class="form-control clockpicker" placeholder="jam">
										</div>


								</div>
                                <div class="col-lg-3">
									<div class="form-group" id="jenkar">
                                            <label for="exampleInputEmail1">Lokasi</label>
											<select id="targetpstb" class="form-control" name="jadwallokasi">
										    <option>~ Isi Lokasi ~</option>
												<?php

													$query = mysqli_query($conn, "SELECT Lokasi_Nama, Lokasi_Id FROM sh_master_lokasi GROUP BY Lokasi_Nama");
							
													while ($bkl = mysqli_fetch_array($query)) {
												?>
													<option value="<?php echo $bkl['Lokasi_Id'] ?>"><?php echo $bkl['Lokasi_Nama'] ?></option>
												<?php } ?>		
											</select>
										</div>


								</div>
						</div>
					</div>

						
					<div class="col-lg-6 col-xs-12 columntwo" style="margin-top: 23px;">
						<div class="row">
							<div class="col-lg-12 col-xs-12">
									<div class="form-group" id="jenkar">
										<a class="btn btn-success" id="plusdiv2"  style="text-align: center; display:block;">Foto Diri Actual webcam</a>  
									</div>
							</div>
						</div>

						<div class="row">
									<div class="col-md-12 col-xs-12">
											<div id="my_camera" style="width: 100% !important;"></div>
											<input type="hidden" name="imagedir" class="image-tag" value="">	
									</div>
						
						</div>

						<div class="row">
									<div class="col-xs-12">
									<input class="btn btn-primary" style="margin: 0 auto; display: block;" type=button value="Capture Image" onClick="take_snapshot()">
									</div>
						
						</div>
					</div>

				</div>

				<div class="col-lg-12">
					<div class="text-center" style="border-top: solid black;">
							<!-- <div class="col-lg-3" style="margin-top: 12px;">
								<button type="submit" class="btn btn-success pull-right" formaction="<?php echo "$aksi?module=back";?>">BACK</button>
							</div> -->
							<div class="col-lg-6" style="margin-top: 12px;">
								<button type="submit" class="btn btn-success pull-right">SAVE</button>
							</div>
							<!-- <div class="col-lg-3" style="margin-top: 12px;">
								<button type="submit" class="btn btn-success pull-right" formaction="<?php echo "$aksi?module=reset";?>">RESET</button>
							</div> -->
					</div>
				
				
				</div>
			</form>

		</div>

		</section>

        <!-- Configure a few settings and attach camera -->
			<script language="JavaScript">
			    Webcam.set({
					width: "100%",
			        height: "100%",
			        dest_width: 640,
					dest_height: 480,
			        image_format: 'jpeg',
			        jpeg_quality: 90
			    });
			  
			    Webcam.attach( '#my_camera' );
			  
			    function take_snapshot() {
			        Webcam.snap( function(data_uri) {
			            $(".image-tag").val(data_uri);
			            document.getElementById('my_camera').innerHTML = '<img style="width: 100%;height: 375px; margin-top: 48px;" src="'+data_uri+'"/>';
			        } );
			    }
			</script>

                                <script type="text/javascript">
                                        $('.clockpicker').clockpicker({
											autoclose: true
										});
                                </script>