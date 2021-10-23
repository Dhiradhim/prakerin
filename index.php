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
			$q_js = mysqli_query($con, "SELECT id FROM user WHERE jabatan='siswa'") or die(mysqli_connect_error());
			$r_js = mysqli_num_rows($q_js);
			$q_st = mysqli_query($con, "SELECT id FROM siswa") or die(mysqli_connect_error());
			$r_st = mysqli_num_rows($q_st);
			$q_sps = mysqli_query($con, "SELECT id FROM siswa WHERE status='1'") or die(mysqli_connect_error());
			$r_sps = mysqli_num_rows($q_sps);
			$q_spt = mysqli_query($con, "SELECT id FROM siswa WHERE status='2'") or die(mysqli_connect_error());
			$r_spt = mysqli_num_rows($q_spt);
			$q_lpm = mysqli_query($con, "SELECT id FROM prakerin") or die(mysqli_connect_error());
			$r_lpm = mysqli_num_rows($q_lpm);
			$q_lps = mysqli_query($con, "SELECT id FROM prakerin WHERE status_prakerin='1'") or die(mysqli_connect_error());
			$r_lps = mysqli_num_rows($q_lps);
			$q_lpt = mysqli_query($con, "SELECT id FROM prakerin WHERE status_prakerin='2'") or die(mysqli_connect_error());
			$r_lpt = mysqli_num_rows($q_lpt);

			?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Jumlah Siswa</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_js;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Siswa Terdaftar</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_st;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Siswa Prakerin Disetujui</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_sps;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Siswa Prakerin Ditolak</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_spt;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Laporan Prakerin Masuk</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_lpm;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Laporan Prakerin Disetujui</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_lps;?></h2>
                                    <p class="text-white mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Laporan Prakerin Ditolak</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?=$r_lpt;?></h2>
                                    <p class="text-white mb-0"></p>
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