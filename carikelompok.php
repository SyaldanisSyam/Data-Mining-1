<?php if (!isset($_SESSION)) session_start();
if ((!isset($_SESSION['_user'])) && (empty($_SESSION['_user']))) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Cari Kelompok</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
<div align="center">
<div class="carianggota">
<form name="frmanggota" method="post" action="">
<p><strong>Cari Kelompok pustaka</strong><br><br>
   <input type="text" name="nama_kelompok">
    <input type="submit" value="Cari" name="bcari">
 
 <?php $kon=mysqli_connect("localhost","root","","pustakac45");
 if (isset($_POST['bcari'])) {
	 $nama_kelompok = $_POST['nama_kelompok'];
	 $sqlcari="select * from kelompok_pustaka where nama_kelompok like '%".$nama_kelompok."%';";
	 $qcari=mysqli_query($kon,$sqlcari);
	 $rcari=mysqli_fetch_array($qcari);
	 if (empty($rcari)) {
		 echo "<script>alert('Rekord tidak ditemukan !');</script>";
	 } else { 
	   echo "<table align=center><tr><td>Nama kelompok :</td></tr>";
	   do {
	   echo "<tr><td>".$rcari['nama_kelompok']."</td><td></td></tr>";
	   } while ($rcari=mysqli_fetch_array($qcari));
	   echo "</table>";
	 
	 }
 }
 mysqli_close($kon);
 ?>
 </div>

 </form>
 </div>
 </body>
</html>