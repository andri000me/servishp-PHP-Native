<?php 
include_once 'config/dao.php';
$dao = new Dao();
// var_dump($_POST);
if (empty($_POST['email'])) {
	header("location:error/");
}
if ($_POST['password1'] != $_POST['password2']) {
	header("location:error/");
}

$password = $_POST['password1'];
$email = $_POST['email'];
if ($dao->updatePass($email,$password)) {
	header("location:login.php");
}
else{
	header("location:error/");
}

?>