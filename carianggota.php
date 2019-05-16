<?php if (!isset($_SESSION)) session_start();
if ((!isset($_SESSION['_user'])) && (empty($_SESSION['_user']))) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>cari Anggota</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
<div align="center">
<div class="carianggota">
<form name="frmanggota" method="post" action="">
<p><strong>Tambah Anggota</strong><br><br>
   <input type="text" name="Nama_Anggota">
    <input type="submit" value="Cari" name="bcari">
 
 <?php $kon=mysqli_connect("localhost","root","","pustakac45");
 if (isset($_POST['bcari'])) {
	 $Nama_Anggota = $_POST['Nama_Anggota'];
	 $sqlcari="select * from anggota where Nama_Anggota like '%".$Nama_Anggota."%';";
	 $qcari=mysqli_query($kon,$sqlcari);
	 $rcari=mysqli_fetch_array($qcari);
	 if (empty($rcari)) {
		 echo "<script>alert('Rekord tidak ditemukan !');</script>";
	 } else { 
	   echo "<table align=center><tr><td>Nama_Anggota</td></tr>";
	   do {
	   echo "<tr><td>".$rcari['Nama_Anggota']."</td><td></td></tr>";
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