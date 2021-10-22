<?php
include "koneksi.php";
$id=$_GET['id'];

$query = "UPDATE siswa SET status='2' WHERE id='$id'";
$sql= mysqli_query($con, $query);
echo '<script>window.location.href="siswa.php?page=1&count=1"</script>';
?>

