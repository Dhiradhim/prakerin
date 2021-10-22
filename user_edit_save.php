<?php
include "koneksi.php";
$id=$_POST['id'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$reppassword=md5($_POST['reppassword']);
$jabatan=$_POST['jabatan'];


if ($password=="")
{
	$query = "UPDATE user set username='$username' WHERE id='$id'";
	$sql= mysqli_query($con, $query);
	echo '<script>window.location.href="user.php?page=1&count=1"</script>';
}
else if ($password !== $reppassword)
{
	echo '<script type="text/javascript">alert("Password Tidak Cocok");</script>';
	echo '<script>window.history.back()</script>';	
}else{
	$query = "UPDATE user set username='$username', password='$password' WHERE id='$id'";
	$sql= mysqli_query($con, $query);
	echo '<script>window.location.href="user.php?page=1&count=1"</script>';
}


?>

