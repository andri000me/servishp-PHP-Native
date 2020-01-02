<?php
include_once 'config/dao.php';
require 'plugins/PHPmailer/class.phpmailer.php';
$mail = new PHPMailer;
$dao = new Dao();

if (!empty($_POST['email'])) {
	if ($dao->validEmail($_POST['email'])) {
		$kode = '';
		$to = $_POST['email'];
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		for ($i = 0; $i < 6; $i++) {
			$kode .= $characters[rand(0, $charactersLength - 1)];
		}
		$token = $kode.'_'.time();
		$dao->insertToken($to,$token);
		$username = 'likuisa13@gmail.com';
		$password = 'penghianat';
		$alias = 'Admin Teknisi Tamvan';
		$mail->isSMTP(true);
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $username;
		$mail->Password = $password;
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom($username, $alias);
		$mail->addReplyTo($username, $alias);
		$mail->addAddress($to);
		$mail->Subject = 'Aktivasi Akun Teknisi Tamvan';
		$mail->isHTML(true);

		$mailContent='
		Silakan Klik Tombol dibawah ini untuk aktivasi akun anda<br> 
		<a href="http://localhost/servishp/reset-password.php?token='.$token.'&email='.$to.'"><button style="background-color: #4CAF50; border: none;  color: white;  padding: 15px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;">AKTIVASI</button></a>';
		$mail->Body = $mailContent;
	}
}

if(!$mail->send()){
	$pesan = "warning,Error, Invalid Email";
}else{
	$pesan = "primary,Success, Please check your email.";
}

header("location:forgot-password.php?pesan=$pesan");
?>