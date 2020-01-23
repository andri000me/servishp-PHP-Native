<?php 
include_once '../config/dao.php';
$dao = new Dao();

$result = $dao->notifPenjualan();
$result = $result->fetch_array();
$notif = $result['jml'];
if ($notif == 0) {
	echo null;
}
else{
	echo $notif;
}
?>