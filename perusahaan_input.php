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
			$query2 = mysqli_query($con, "SELECT id,nama_perusahaan FROM perusahaan ORDER BY id") or die(mysqli_connect_error());
			$row2 = mysqli_fetch_assoc($query2);	
			
			$nis=$row_user['username'];
			$query3 = mysqli_query($con, "SELECT siswa.*, perusahaan.id, perusahaan.nama_perusahaan FROM siswa INNER JOIN perusahaan ON siswa.id_perusahaan=perusahaan.id WHERE nis='$nis'") or die(mysqli_connect_error());
			$row3 = mysqli_fetch_assoc($query3);
			$xrow3 = mysqli_num_rows($query3)
			?>
			
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Input Data Perusahaan</h4>
                                <div class="basic-form">
                                    <?php
									if ($xrow3=="0") {
									?>									
									<form method="post" action="pendaftaran-siswa_save.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                                            <div class="col-sm-5">
                                                <input type="textbox" class="form-control" name="alamat_perusahaan" placeholder="Alamat Perusahaan" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No. Telp Perusahaan</label>
                                            <div class="col-sm-3">
                                                <input type="textbox" class="form-control" name="no_telp" placeholder="No. Telp Perusahaan" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-dark">Submit</button>
                                            </div>
                                        </div>
                                    </form>
									<?php
									} else {
									?>
									<form method="post" action ="pendaftaran-siswa_edit.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly name="nama" placeholder="Nama Lengkap" value="<?=$row3['nama'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="nis" readonly value="<?=$row3['nis'];?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="kelas" readonly value="<?=$row3['kelas'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="jenis_kelamin" readonly value="<?=$row3['jenis_kelamin'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="jurusan" readonly value="<?=$row3['jurusan'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="perusahaan" readonly value="<?=$row3['nama_perusahaan'];?>">
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-2">
												<?php if ($row3['status']=="0") { echo "<button disabled type='submit' class='btn btn-default'>BELUM DISETUJUI</button>";} else if ($row3['status']=="1") { echo "<button disabled type='submit' class='btn btn-success'>DISETUJUI</button>";} else { echo "<button disabled type='submit' class='btn btn-danger'>TIDAK DISETUJUI</button>";}?>
											</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-warning">Edit Data</button>
                                            </div>
                                        </div>
                                    </form>
									<?php 
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
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