        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menu</li>
					<li>
                        <a href="index.php" aria-expanded="false">
                            <i class="icon-home menu-icon"></i><span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Prakerin</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php 
							include('koneksi.php');
							$id = $_SESSION['id'];
							$query_id = mysqli_query($con, "SELECT * FROM user WHERE id='$id'") or die(mysqli_connect_error());
							$row_id = mysqli_fetch_assoc($query_id);
							if ($row_id['jabatan']=='siswa') {
								echo '<li><a href="pendaftaran-siswa.php">Pendaftaran</a></li>';
							}
							else if ($row_id['jabatan']=='administrator'){
								echo '<li><a href="user_input.php">Buat User Baru</a></li>';
							}
							?>
                            <li><a href="perusahaan.php">Referensi Tempat</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="siswa.php" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Daftar Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Laporan Prakerin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="inputlaporan.php">Input Laporan</a></li>
                            <li><a href="lihatlaporan.php">Lihat Laporan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>