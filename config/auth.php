<?php 
ob_start();
session_start();
ob_end_clean();

if (isset($_GET["out"])) {


	session_destroy();

	header("Location:../index.php?logout=sukses");
}


?>