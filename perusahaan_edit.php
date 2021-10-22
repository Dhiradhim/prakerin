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
			$query = mysqli_query($con, "SELECT * FROM perusahaan WHERE id='$id'") or die(mysqli_connect_error());
			$row = mysqli_fetch_assoc($query);
			?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit Data Perusahaan</h4>
                                <div class="basic-form">								
									<form method="post" action="perusahaan_edit_save.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?=$row['nama_perusahaan'];?>">
                                                <input type="hidden" class="form-control" name="id" placeholder="Nama Perusahaan" value="<?=$row['id'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                                            <div class="col-sm-5">
                                                <input type="textbox" class="form-control" name="alamat_perusahaan" placeholder="Alamat Perusahaan" value="<?=$row['alamat_perusahaan'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No. Telp Perusahaan</label>
                                            <div class="col-sm-3">
                                                <input type="textbox" class="form-control" name="no_telp" placeholder="No. Telp Perusahaan" value="<?=$row['no_telp'];?>">
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