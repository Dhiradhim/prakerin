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
			
			
			$username=$row_user['username'];
			$query3 = mysqli_query($con, "SELECT siswa.*, user.username, perusahaan.nama_perusahaan FROM user INNER JOIN siswa ON user.id=siswa.id_user INNER JOIN perusahaan ON siswa.id_perusahaan=perusahaan.id WHERE username='$username'") or die(mysqli_connect_error());
			$row3 = mysqli_fetch_assoc($query3);
			$xrow3 = mysqli_num_rows($query3);
			?>
			
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pendaftaran Prakerin</h4>
                                <div class="basic-form">
                                    <?php
									if ($xrow3=="0") {
									?>									
									<form method="post" action="pendaftaran-siswa_save.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                                <input type="hidden" class="form-control" name="id" value=<?=$id;?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="nis" readonly value="<?=$row_user['username'];?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="jurusan">
													<option value="" disabled selected>-</option>
													<option value="OTKP">OTKP</option>
													<option value="TKJ">TKJ</option>
													<option value="TBSM">TBSM</option>
												</select>
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="kelas">
													<option value="" disabled selected>-</option>
													<option value="11OTKP1">11OTKP1</option>
													<option value="11OTKP2">11OTKP2</option>
													<option value="11TKJ1">11TKJ1</option>
													<option value="11TKJ2">11TKJ2</option>
													<option value="11TKJ3">11TKJ3</option>
													<option value="11TBSM1">11TBSM1</option>
												</select>
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="jenis_kelamin">
													<option value="" disabled selected>-</option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
                                        </div>

										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                                            <div class="col-sm-4">
												<select class="form-control" name="perusahaan">
													<option value="" disabled selected>-</option>
													<?php do { ?>
													<option value="<?=$row2['id'];?>"><?=$row2['nama_perusahaan'];?></option>
													<?php } while ($row2= mysqli_fetch_assoc($query2));?>
												</select>
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
                                                <input type="text" class="form-control" name="nis" readonly value="<?=$row3['username'];?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-2">
												<input type="text" class="form-control" name="jurusan" readonly value="<?=$row3['jurusan'];?>">
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
                                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                                            <div class="col-sm-4">
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