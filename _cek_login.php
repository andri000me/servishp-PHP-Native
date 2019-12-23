<?php 
include_once 'config/dao.php';
$dao = new Dao();
if (isset($_POST['username']) && isset($_POST['password'])) {
	# code...
	$level=""; 
	$nama=""; 
	$id_user=""; 
	$hasil = $dao->cekLogin($_POST['username'], $_POST['password']);

	if($hasil->num_rows == 1){  
		session_start();
		foreach ($hasil as $value) {
			$level = $value['level'];
			$nama = $value['nama'];
			$id_user = $value['id_user'];
		}
		if ($level == "admin") {
			$_SESSION['level']=$level;
			$_SESSION['nama']=$nama;	
			header('location:admin/');
		}
		else{
			$_SESSION['level']=$level;
			$_SESSION['nama']=$nama;	
			$_SESSION['id']=$id_user;	
			header('location:pengguna/');	
		}
	}
	else{
		?>
		<script language="JavaScript">
			alert('Login gagal! Username atau Password tidak sesuai.');
			document.location='index.php';
		</script>
		<?php
	}
}

?>