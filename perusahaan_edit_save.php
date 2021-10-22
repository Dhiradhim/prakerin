<?php
include "koneksi.php";
$id=$_POST['id'];
$nama_perusahaan=$_POST['nama_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$no_telp=$_POST['no_telp'];

$query = "UPDATE perusahaan set nama_perusahaan='$nama_perusahaan', alamat_perusahaan='$alamat_perusahaan', no_telp='$no_telp' WHERE id='$id'";
$sql= mysqli_query($con, $query);
echo '<script>window.location.href="perusahaan.php?page=1&count=1"</script>';



?>

