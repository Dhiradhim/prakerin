<?php
include "koneksi.php";
$id=$_GET['id'];
$page=$_GET['page'];
if ($page=='siswa'){
$query = "UPDATE siswa SET status='1' WHERE id='$id'";
$sql= mysqli_query($con, $query);
echo '<script>window.location.href="siswa.php?page=1&count=1"</script>';
}
else if ($page=='lap'){
$query = "UPDATE prakerin SET status_prakerin='1' WHERE id='$id'";
$sql= mysqli_query($con, $query);
echo '<script>window.location.href="lihatlaporan.php?page=1&count=1"</script>';
}
?>

