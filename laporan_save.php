<?php
session_start();
include "koneksi.php";
$id_siswa=$_POST['id_siswa'];
$id_perusahaan=$_POST['id_perusahaan'];
$id_user=$_SESSION['id'];

$data_tgl_mulai=$_POST['tgl_mulai'];
$xdata_tgl_mulai=explode("/", $data_tgl_mulai);
$tgl_mulai_bulan = $xdata_tgl_mulai[0];
$tgl_mulai_hari = $xdata_tgl_mulai[1];
$tgl_mulai_tahun = $xdata_tgl_mulai[2];
$tgl_mulai=$tgl_mulai_tahun."-".$tgl_mulai_bulan."-".$tgl_mulai_hari;

$data_tgl_kembali=$_POST['tgl_kembali'];
$xdata_tgl_kembali=explode("/", $data_tgl_kembali);
$tgl_kembali_bulan = $xdata_tgl_kembali[0];
$tgl_kembali_hari = $xdata_tgl_kembali[1];
$tgl_kembali_tahun = $xdata_tgl_kembali[2];
$tgl_kembali=$tgl_kembali_tahun."-".$tgl_kembali_bulan."-".$tgl_kembali_hari;



$query = "INSERT into prakerin (id_siswa,id_user,id_perusahaan,tgl_kembali,tgl_mulai) values ('$id_siswa','$id_user','$id_perusahaan','$tgl_kembali','$tgl_mulai')";
$sql=mysqli_query($con, $query);
echo '<script>window.location.href="lihatlaporan.php?page=1&count=1"</script>';
?>

