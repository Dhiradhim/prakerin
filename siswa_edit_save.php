<?php
include "koneksi.php";
$id=$_POST['id'];
$nama=$_POST['nama'];
$jenis_kelamin= $_POST['jenis_kelamin'];
$kelas=$_POST['kelas'];
$jurusan=$_POST['jurusan'];
$id_perusahaan=$_POST['perusahaan'];


$query = "UPDATE siswa SET nama='$nama',jenis_kelamin='$jenis_kelamin',kelas='$kelas',jurusan='$jurusan',id_perusahaan='$id_perusahaan' WHERE id='$id'";
$sql=mysqli_query($con, $query);
echo '<script>window.location.href="siswa.php?page=1&count=1"</script>';
?>

