<?php
	if(count(get_included_files()) ==1) exit("Direct access not permitted.");
	
	$conn = mysqli_connect("10.102.4.102","root","root","security_log","3306") or die("Tidak Terkoneksi");
	$db = mysqli_select_db($conn, "security_log") or die("Database Tidak Ditemukan");
?>
