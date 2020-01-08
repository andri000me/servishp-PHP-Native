<?php 
error_reporting('off');
session_start();
if ($_SESSION['level'] != "pengguna" || empty($_SESSION['level'])) {
?>
    <script type="text/javascript">
        document.location = '../';
    </script>
<?php    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../favicon.png" type="image/x-icon">
  <title>Teknisi Tamvan</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/shop-homepage.css" rel="stylesheet">
</head>