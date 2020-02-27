<?php
include ("../config/koneksi.php");


if ($_GET['module'] == 'feedback') {


$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start
// $link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
// $gt = str_replace('https://vistrax.enseval.com/mod_draft/view.php?cab=','',$link);
//echo "$gt";

// $sql = mysqli_query($conn, "SELECT Survey_Id FROM sh_master_survey u JOIN sh_master_lokasi uc ON u.Lokasi_Id=uc.Lokasi_Id WHERE Survey_Feedback IS NOT NULL AND Survey_Feedback<>''"); // Query untuk menghitung seluruh data siswa
$sql = mysqli_query($conn, "SELECT Survey_Id FROM sh_master_survey u JOIN sh_master_lokasi uc ON u.Lokasi_Id=uc.Lokasi_Id");
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

$query = "SELECT * FROM sh_master_survey u JOIN sh_master_lokasi uc ON u.Lokasi_Id=uc.Lokasi_Id WHERE (Survey_Id LIKE '%".$search."%' OR Survey_Result LIKE '%".$search."%' OR Survey_Feedback LIKE '%".$search."%' OR Survey_Date LIKE '%".$search."%')";
$order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
$order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;


$sql_data = mysqli_query($conn, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
$sql_filter = mysqli_query($conn, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter

$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
$callback = array(
    'draw'=>$_POST['draw'], // Ini dari datatablenya
    'recordsTotal'=>$sql_count,
    'recordsFiltered'=>$sql_filter_count,
    'data'=>$data
);

header('Content-Type: application/json');
echo json_encode($callback); // Convert array $callback ke json

} else if ($_GET['module'] == 'allfeedback') {


    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    // $link = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    // $gt = str_replace('https://vistrax.enseval.com/mod_draft/view.php?cab=','',$link);
    //echo "$gt";

    $sql = mysqli_query($conn, "SELECT u.Survey_Id FROM sh_master_survey u JOIN sh_trans_survey uc JOIN sh_master_option ud JOIN sh_master_lokasi ue ON u.Survey_Id=uc.Survey_Id AND uc.Trans_Survey_Option=ud.Option_Id AND u.Lokasi_Id=ue.Lokasi_Id"); // Query untuk menghitung seluruh data siswa
    $sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

    $query = "SELECT u.Survey_Id, u.Survey_Result, u.Survey_Feedback, u.Survey_Date, u.Lokasi_Id, u.id_idob, uc.Trans_Survey_Option, ud.Option_Name, ue.Lokasi_Nama FROM sh_master_survey u JOIN sh_trans_survey uc JOIN sh_master_option ud JOIN sh_master_lokasi ue ON u.Survey_Id=uc.Survey_Id AND uc.Trans_Survey_Option=ud.Option_Id AND u.Lokasi_Id=ue.Lokasi_Id WHERE (u.Survey_Id LIKE '%".$search."%' OR u.Survey_Result LIKE '%".$search."%' OR u.Survey_Feedback LIKE '%".$search."%' OR u.Survey_Date LIKE '%".$search."%' OR ud.Option_Name LIKE '%".$search."%' OR ue.Lokasi_Nama LIKE '%".$search."%')";
    $order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;


    $sql_data = mysqli_query($conn, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
    $sql_filter = mysqli_query($conn, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
    $sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter

    $data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_count,
        'recordsFiltered'=>$sql_filter_count,
        'data'=>$data
    );

    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json



}





?>