<?php
include ("../config/koneksi.php");

if ($_GET['module'] == 'saveob'){

    function acakangkahuruf($panjang) {
        $karakter = '123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
          $pos = rand(0, strlen($karakter)-1);
          $string .= $karakter{$pos};
        }
        return $string;
      }

      $acak2 = acakangkahuruf(6);
      $nounik = $acak2;

    $idobe = $_POST['idob'];
    $jenisid = $_POST['jenis_id'];
    $nomorid = $_POST['nomor_id'];
    $namaob = $_POST['nama_ob'];
    $cab = $_POST['cabang'];
    $passdefaultob = sha1('12345');
    $passunikob = sha1($nounik);
    $passuniknoencob = $nounik;
    $aksesdefob = '0';
    $aksesdefyesob = '4';
    $tanggallahir = $_POST['tanggal_lahir'];
    $jeniskelamin = $_POST['jenis_kelamin'];
    $alamats = $_POST['alamat_tempat_tinggal'];
    $notelp = $_POST['no_telp'];
    $isapps = $_POST['is_app'];
    $mail = $_POST['email'];
    $akhirkontrak = $_POST['akhir_kontrak'];
    $jadwaljam = $_POST['jadwaljam'];
    $jadwallokasi = $_POST['jadwallokasi'];
    $fotodiriob = $_POST['imagedir'];

    $folderPath = "upload_foto_ob/";
  
	$image_parts = explode(";base64,", $fotodiriob);
	$image_type_aux = explode("image/", $image_parts[0]);
	$image_type = $image_type_aux[1];
	$image_base64 = base64_decode($image_parts[1]);
	$fileName = date("Y-m-d") . uniqid() . '.jpeg';
	$file = $folderPath . $fileName;
    $infilewj = file_put_contents($file, $image_base64);

    // $arr = get_defined_vars();
    // print_r($arr);

    if ($isapps == 'tidak') {

        $query = mysqli_prepare($conn, "INSERT INTO master_ob(`id_idob`,`jenis_id`,`nomor_id`,`nama_ob`,`tgl_lahir`,`jenis_kelamin`,`alamat_tempat_tinggal`,`no_telp`,`email`,`akhir_kontrak`,`is_app`,`foto_diri_ob`,`cabang`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($query, "sssssssssssss", $idobe,$jenisid,$nomorid,$namaob,$tanggallahir,$jeniskelamin,$alamats,$notelp,$mail,$akhirkontrak,$isapps,$fileName,$cab);
        mysqli_stmt_execute($query);
        $query->close();

        $query1 = mysqli_prepare($conn, "INSERT INTO mas_employee(`nik`,`nama`,`password`,`akses`,`email`,`mobile`) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($query1, "ssssss", $idobe,$idobe,$passdefaultob,$aksesdefob,$mail,$notelp);
        mysqli_stmt_execute($query1);
        $query1->close();

        header("Location: ../sr_media.php?module=inputob");


    } else {

        $query = mysqli_prepare($conn, "INSERT INTO master_ob(`id_idob`,`jenis_id`,`nomor_id`,`nama_ob`,`tgl_lahir`,`jenis_kelamin`,`alamat_tempat_tinggal`,`no_telp`,`email`,`akhir_kontrak`,`is_app`,`foto_diri_ob`,`cabang`,`pass_app`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($query, "ssssssssssssss", $idobe,$jenisid,$nomorid,$namaob,$tanggallahir,$jeniskelamin,$alamats,$notelp,$mail,$akhirkontrak,$isapps,$fileName,$cab,$passuniknoencob);
        mysqli_stmt_execute($query);
        $query->close();

        $query1 = mysqli_prepare($conn, "INSERT INTO mas_employee(`nik`,`nama`,`password`,`akses`,`kodeUser`,`email`,`mobile`,`cabang`) VALUES (?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($query1, "ssssssss", $idobe,$idobe,$passunikob,$aksesdefyesob,$nounik,$mail,$notelp,$cab);
        mysqli_stmt_execute($query1);
        $query1->close();

        sleep(5);

        $querytwo = mysqli_prepare($conn, "INSERT INTO sh_master_jadwalob(`Jadwal_Time`,`Lokasi_Id`,`id_idob`) VALUES (?,?,?)");
        mysqli_stmt_bind_param($querytwo, "sss", $jadwaljam,$jadwallokasi,$idobe);
        mysqli_stmt_execute($querytwo);
        $query1->close();

        header("Location: ../sr_media.php?module=inputob");



    }



}




// $arr = get_defined_vars();

// print_r($arr);



?>