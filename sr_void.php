<?php
session_start();
error_reporting(0);
include('config/koneksi.php');

// $arr = get_defined_vars();
// print_r($arr);

$username = $_POST['usernm'];
$password = $_POST['pass'];
$ldaprdn = 'ENSEVAL' . "\\" . $username;

$ldap=ldap_connect("10.102.4.4");
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

$bind = @ldap_bind($ldap, $ldaprdn, $password);

$filter="(sAMAccountName=$username)";
$result = ldap_search($ldap,"dc=ENSEVAL,dc=COM",$filter);
ldap_sort($ldap,$result,"sn");
$info = ldap_get_entries($ldap, $result);

for ($i=0; $i<$info["count"]; $i++) {
    $sess_array = array(
        $nik = $info[$i]['employeenumber'][0], 
        $username = $info[$i]['samaccountname'][0],
        $nama  = $info[$i]['displayname'][0],
        $email  = $info[$i]['userprincipalname'][0],
        $mobile  = $info[$i]['mobile'][0],
        $department  = $info[$i]['department'][0],
        $cabang  = strtoupper($info[$i]['physicaldeliveryofficename'][0]),
        $primarygroupid = $info[$i]['primarygroupid'][0],

    );
   }

   
if ($bind == 1){

    // echo "ok";
    $_SESSION['nama'] = $username;
    header("Location: sr_media.php?module=home");


} else {

    // echo "not ok";

    header("Location: https://guard.enseval.com/survey/");

};



//    $arr = get_defined_vars();
//    print_r($arr);




?>