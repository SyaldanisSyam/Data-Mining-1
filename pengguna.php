<!DOCTYPE html>
<html>
 <head>
  <title>Pengguna</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
 <div align="center">
<div class="pengguna">
 <form name="frmanggota" method="post" action="">
<p><strong>Pengguna Baru</strong><br><br>
<input type="text" name="txtusername" placeholder="username">
<input type="text" name="txtpassword" placeholder="password">
<input type="submit" value="Simpan" name="bSimpan"></p>
</form>
</div></div>
 </body>
</html>
<?php if (isset($_POST['bSimpan'])) {
  $username=$_POST['txtusername'];
  $password=$_POST['txtpassword'];
  if ((empty($username)) OR (empty($password))) exit;
  $koneksi=mysqli_connect("localhost","root","","pustakac45");
  $sql="insert into pengguna (username,password) values('".$_POST['txtusername']."','".$_POST['txtpassword']."');";
  $q=mysqli_query($koneksi,$sql);
  if ($q) {
		echo "<script>alert('Rekord sudah disimpan');</script>";
	} else {
		echo "<script>alert('Rekord tidak  tersimpan');</script>";
	}
}
?>