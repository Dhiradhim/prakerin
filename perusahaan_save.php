<?php
include "koneksi.php";
$nama_perusahaan=$_POST['nama_perusahaan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$no_telp=$_POST['no_telp'];

$query = "INSERT into perusahaan (nama_perusahaan,alamat_perusahaan,no_telp) values ('$nama_perusahaan','$alamat_perusahaan','$no_telp')";
$sql=mysqli_query($con, $query);
echo '<script type="text/javascript">alert("Data Perusahaan Berhasil Ditambahkan");</script>';
echo '<script>window.location.href="perusahaan.php?page=1&count=1"</script>';


?>

