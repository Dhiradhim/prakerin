<!DOCTYPE html>
<html lang="en">

<head>
<?php include('head.html');?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
		<?php include ('header.html');?>	

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include('side.php');?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>
            <!-- row -->
			<!-- QUERY START -->
			<?php
			include('koneksi.php');
			$username=$row_user['username'];
			$id=$_SESSION['id'];
			$query_cek = mysqli_query($con, "SELECT id_user FROM prakerin WHERE id_user='$id'") or die(mysqli_connect_error());
			$row_cek = mysqli_num_rows($query_cek);
			$query_cek2 = mysqli_query($con, "SELECT status FROM siswa WHERE id_user='$id'") or die(mysqli_connect_error());
			$row_cek2 = mysqli_fetch_assoc($query_cek2);		
			
			if ($row_cek2['status']=='0' OR $row_cek2['status']=='2')
			{
				echo '<script>window.location.href="pendaftaran-siswa.php"</script>';
			}
			else if ($row_cek=='0')
			{
			$query = mysqli_query($con, "SELECT siswa.*, user.username, perusahaan.nama_perusahaan FROM user INNER JOIN siswa ON user.id=siswa.id_user INNER JOIN perusahaan ON siswa.id_perusahaan=perusahaan.id WHERE username='$username'") or die(mysqli_connect_error());
			$row = mysqli_fetch_assoc($query);
			$count = 1;
			?>
			
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Laporan Prakerin</h4>
                                <div class="basic-form">
                                    <form method="post" action="laporan_save.php">
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly name="nama" placeholder="Nama Lengkap" value="<?=$row['nama'];?>">
                                                <input type="hidden" class="form-control" readonly name="id_siswa" value="<?=$row['id'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="username" readonly value="<?=$row['username'];?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="kelas" readonly value="<?=$row['kelas'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="jenis_kelamin" readonly value="<?=$row['jenis_kelamin'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="jurusan" readonly value="<?=$row['jurusan'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                                            <div class="col-sm-3">
												<input type="text" class="form-control" name="perusahaan" readonly value="<?=$row['nama_perusahaan'];?>">
												<input type="hidden" class="form-control" readonly name="id_perusahaan" value="<?=$row['id_perusahaan'];?>">
											</div>
                                        </div>
									   <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                            <div class="input-group col-sm-2">
                                                <input type="text" required name="tgl_mulai" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                            </div>
										</div>
									   <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                            <div class="input-group col-sm-2">
                                                <input type="text" required name="tgl_kembali" class="form-control mydatepicker" placeholder="mm/dd/yyyy"> <span class="input-group-append"><span class="input-group-text"><i class="mdi mdi-calendar-check"></i></span></span>
                                            </div>
										</div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-dark">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php 
			}
			else
			{
				echo '<script>window.location.href="lihatlaporan-siswa.php"</script>';
			}
			?>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
		<?php include('footer.html');?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	<?php include('scripts.html');?>

</body>

</html>