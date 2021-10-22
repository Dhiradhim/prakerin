<?php
include('koneksi.php');
$id = $_GET['id'];

$cek = mysqli_query($con, "SELECT id FROM user WHERE id='$id'") or die(mysql_error());
if(mysqli_num_rows($cek) == 0){
	echo '<script>window.history.back()</script>';
}else{
	$del = mysqli_query($con, "DELETE FROM user WHERE id='$id'");
	$del2 = mysqli_query($con, "DELETE FROM siswa WHERE id_user='$id'");
	$del2 = mysqli_query($con, "DELETE FROM prakerin WHERE id_user='$id'");
if($del){
	echo ("<script language='JavaScript'> window.location.href='user.php?page=1&count=1'; </script>");
	}else{
		echo 'Gagal menghapus data! ';
		echo '<a href="user.php?page=1&count=1">Kembali</a>';

	}

}
	?>