<?php
include "koneksi.php";
$id_user=$_POST['id'];
$nama=$_POST['nama'];
$nis=$_POST['nis'];
$jenis_kelamin= $_POST['jenis_kelamin'];
$kelas=$_POST['kelas'];
$jurusan=$_POST['jurusan'];
$id_perusahaan=$_POST['perusahaan'];


$query = "INSERT into siswa (id_user,nama,jenis_kelamin,nis,kelas,jurusan,id_perusahaan) values ('$id_user','$nama','$jenis_kelamin','$nis','$kelas','$jurusan','$id_perusahaan')";
$sql=mysqli_query($con, $query);
echo '<script>window.location.href="pendaftaran-siswa.php"</script>';
?>

