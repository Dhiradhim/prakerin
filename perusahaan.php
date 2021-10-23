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
                         <?php
							if ($row_user['jabatan']=='administrator') {	
								echo '<li class="breadcrumb-item"><a href="perusahaan_input.php"><button type="button" class="btn mb-1 btn-outline-primary">Input Data Baru</button></a></li>';
							}
							else
							{
							}
						?>
                    </ol>
                </div>
            </div>
            <!-- row -->
			
			<!-- QUERY START -->
			<?php
			include('koneksi.php');
			$query = mysqli_query($con, "SELECT * FROM perusahaan ORDER by id") or die(mysqli_connect_error());
			$row = mysqli_fetch_assoc($query);
			$count = 1;
			?>
			
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h4 class="card-title">Data Perusahaan</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th><div align="center">No</div></th>
                                                <th><div align="center">Nama Perusahaan</div></th>
                                                <th><div align="center">Alamat</div></th>
                                                <th><div align="center">No. Telp</div></th>
                                                	<?php
													if ($row_user['jabatan']=='administrator') {	
													echo '<th><div align="center">Action</div></th>';
													}
													else
													{
													}
													?>
												
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php do { ?>
												<tr>
													<td><div align="center"><?php echo $count; ?></div></td>
													<td><div align="center"><?php echo $row['nama_perusahaan']; ?></div></td>
													<td><div align="center"><?php echo $row['alamat_perusahaan']; ?></div></td>
													<td><div align="center"><?php echo $row['no_telp']; ?></div></td>
													<?php
													if ($row_user['jabatan']=='administrator') {	
													echo '<td><div align="center">';
													echo '<a href="perusahaan_edit.php?id='.$row['id'].'" title="Edit"> <img src="images/application_form_edit.png" width="16" height="16" /></a>  ';
													echo '<a href="perusahaan_delete.php?id='.$row['id'].'" class="delete" title="Delete"><img src="images/application_delete.png" width="16" height="16" /></a> </td>';
													}
													else
													{
													}
													?>
												</tr>
											<?php 
											$count++;
											} while ($row = mysqli_fetch_assoc($query)); 
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><div align="center">No</div></th>
                                                <th><div align="center">Nama Perusahaan</div></th>
                                                <th><div align="center">Alamat</div></th>
                                                <th><div align="center">No. Telp</div></th>
												    <?php
													if ($row_user['jabatan']=='administrator') {	
													echo '<th><div align="center">Action</div></th>';
													}
													else
													{
													}
													?>
                                            </tr>
                                        </tfoot>
                                    </table>
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