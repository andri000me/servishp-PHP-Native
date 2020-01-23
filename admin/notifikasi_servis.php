<?php 
include_once '../config/dao.php';
$dao = new Dao();

$result = $dao->notifServis('konsul-baru');
$result = $result->fetch_array();
$notif_konsul = $result['jml'];

$result = $dao->notifServis('aktif');
$result = $result->fetch_array();
$notif_servis = $result['jml'];
$notif = $notif_servis+$notif_konsul;
if ($notif == 0) {
	echo null;
}
else{
	echo $notif;
}
 ?>