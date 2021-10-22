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
			$id=$_GET['id'];
			$query2 = mysqli_query($con, "SELECT id,nama_perusahaan FROM perusahaan ORDER BY id") or die(mysqli_connect_error());
			$row2 = mysqli_fetch_assoc($query2);	
		
			
			$username=$row_user['username'];
			$query = mysqli_query($con, "SELECT siswa.*, user.username, perusahaan.id AS idper, perusahaan.nama_perusahaan FROM siswa INNER JOIN user ON siswa.id_user=user.id INNER JOIN perusahaan ON siswa.id_perusahaan=perusahaan.id WHERE siswa.id='$id'") or die(mysqli_connect_error());
			$row = mysqli_fetch_assoc($query);
			$idper = $row['idper'];	
			?>
			
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Data</h4>
                                <div class="basic-form">								
									<form method="post" action="siswa_edit_save.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?=$row['nama'];?>">
                                                <input type="hidden" class="form-control" name="id" value=<?=$id;?>>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">NIS</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="nis" readonly value="<?=$row['username'];?>">
                                            </div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="jurusan">
													<option <?php if( $row['jurusan']=='OTKP'){echo "selected"; } ?> value="OTKP">OTKP</option>
													<option <?php if( $row['jurusan']=='TKJ'){echo "selected"; } ?> value="TKJ">TKJ</option>
													<option <?php if( $row['jurusan']=='TBSM'){echo "selected"; } ?> value="TBSM">TBSM</option>
												</select>
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="kelas">
													<option <?php if( $row['kelas']=='11OTKP1'){echo "selected"; } ?> value="11OTKP1">11OTKP1</option>
													<option <?php if( $row['kelas']=='11OTKP2'){echo "selected"; } ?> value="11OTKP2">11OTKP2</option>
													<option <?php if( $row['kelas']=='11TKJ1'){echo "selected"; } ?> value="11TKJ1">11TKJ1</option>
													<option <?php if( $row['kelas']=='11TKJ2'){echo "selected"; } ?> value="11TKJ2">11TKJ2</option>
													<option <?php if( $row['kelas']=='11TKJ3'){echo "selected"; } ?> value="11TKJ3">11TKJ3</option>
													<option <?php if( $row['kelas']=='11TBSM1'){echo "selected"; } ?> value="11TBSM1">11TBSM1</option>
												</select>
											</div>
                                        </div>
										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-2">
												<select class="form-control" name="jenis_kelamin">
													<option <?php if( $row['jenis_kelamin']=='Laki-laki'){echo "selected"; } ?> value="Laki-laki">Laki-laki</option>
													<option <?php if( $row['jenis_kelamin']=='Perempuan'){echo "selected"; } ?> value="Perempuan">Perempuan</option> 
												</select>
											</div>
                                        </div>

										<div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                                            <div class="col-sm-4">
												<select class="form-control" name="perusahaan">
													<option value="" disabled selected>-</option>
													<?php do { ?>
													<option <?php if( $row2['id']==$idper){echo "selected"; } ?> value="<?=$row2['id'];?>"><?=$row2['nama_perusahaan'];?></option>
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