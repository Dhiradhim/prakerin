<?php 
	include 'koneksi.php';
	$id=$_GET['id'];
	$query = mysqli_query($con, "SELECT siswa.nama, siswa.kelas, siswa.jurusan, siswa.jenis_kelamin, siswa.status, user.username, perusahaan.nama_perusahaan, prakerin.* FROM prakerin INNER JOIN user ON user.id=prakerin.id_user INNER JOIN perusahaan ON prakerin.id_perusahaan=perusahaan.id INNER JOIN siswa ON siswa.id=prakerin.id_siswa WHERE prakerin.id='$id'") or die(mysqli_connect_error());
	$row = mysqli_fetch_assoc($query);
	
	if ($row['status_prakerin']=='1')
	{
		$status='DISETUJUI';
	} else
	{
		$status='TIDAK DISETUJUI';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN PRAKERIN SMK AZ-Zahra Sepatan</title>
</head>
<body>

	<center>

		<h1>DATA LAPORAN PRAKERIN</h1>
		<h2>SMK AZ-Zahra Sepatan</h2>
		<h3><?=$row['nama'];?></h3>
		<br>


	

<table style="width: 459px; height: 353px;" border="2">
<tbody>
<tr>
<td style="width: 147.656px;"><strong>Nama</strong></td>
<td style="width: 309.344px;"><?=$row['nama'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>NIS</strong></td>
<td style="width: 309.344px;"><?=$row['username'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Jenis Kelamin</strong></td>
<td style="width: 309.344px;"><?=$row['jenis_kelamin'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Jurusan</strong></td>
<td style="width: 309.344px;"><?=$row['jurusan'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Kelas</strong></td>
<td style="width: 309.344px;"><?=$row['kelas'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Perusahaan</strong></td>
<td style="width: 309.344px;"><?=$row['nama_perusahaan'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Tanggal Mulai</strong></td>
<td style="width: 309.344px;"><?=$row['tgl_mulai'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Tanggal Selesai</strong></td>
<td style="width: 309.344px;"><?=$row['tgl_kembali'];?></td>
</tr>
<tr>
<td style="width: 147.656px;"><strong>Catatan</strong></td>
<td style="width: 309.344px;"><?=$status;?></td>
</tr>
</tbody>
</table>

	<script>
		window.print();
		window.close();
	</script>
	
	
</body>
</html>