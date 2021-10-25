<?php
session_start();  
include('koneksi.php');
$id=$_SESSION['id'];
$query=mysqli_query($con, "SELECT password FROM user WHERE id='$id'") or die(mysqli_connect_error());
$row=mysqli_fetch_assoc($query);
$old=md5($_POST['old']);
$new=md5($_POST['new']);
$rep=md5($_POST['rep']);

if ($old !== $row['password'])
{
	echo '<script type="text/javascript">alert("Password Lama Salah");</script>';
	echo '<script>window.location.href="changepw.php"</script>';
}else if ($new !== $rep)
{
	echo '<script type="text/javascript">alert("Password Baru Tidak Cocok");</script>';
	echo '<script>window.location.href="changepw.php"</script>';
}else{
	$query = "UPDATE user SET password='$new' WHERE id='$id'";
	$update = mysqli_query($con, $query);
	echo '<script type="text/javascript">alert("Password Berhasil Diganti. Silahkan LOGIN kembali");</script>';
	echo '<script>window.location.href="logout.php"</script>';
}?>