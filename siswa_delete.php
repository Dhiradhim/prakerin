<?php
include('koneksi.php');
$id = $_GET['id'];

$cek = mysqli_query($con, "SELECT id,id_user FROM siswa WHERE id='$id'") or die(mysql_error());
if(mysqli_num_rows($cek) == 0){
	echo '<script>window.history.back()</script>';
}else{
	$del = mysqli_query($con, "DELETE FROM siswa WHERE id='$id'");
	$del2 = mysqli_query($con, "DELETE FROM user WHERE id='$id_user'");
	$del3 = mysqli_query($con, "DELETE FROM siswa WHERE id_user='$id_user'");
if($del){
	echo ("<script language='JavaScript'> window.location.href='siswa.php?page=1&count=1'; </script>");
	}else{
		echo 'Gagal menghapus data! ';
		echo '<a href="siswa.php?page=1&count=1">Kembali</a>';

	}

}
	?>