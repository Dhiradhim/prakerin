<?php
include "koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$reppassword=md5($_POST['reppassword']);
$jabatan=$_POST['jabatan'];

if ($password !== $reppassword)
{
	echo '<script type="text/javascript">alert("Password Tidak Cocok");</script>';
	echo '<script>window.history.back()</script>';	
}else{
	$query = "INSERT into user (username,password,jabatan) values ('$username','$password','$jabatan')";
	$sql=mysqli_query($con, $query);
	echo '<script type="text/javascript">alert("User Berhasil Ditambahkan");</script>';
	echo '<script>window.location.href="user.php?page=1&count=1"</script>';
}


?>

