<?php  
session_start();//session starts here  
?> 
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
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

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
								<center><img src="images/logo1.png" height="50%" width="50%"></center>
								<a class="text-center"><h3>Sistem Informasi Prakerin</h3></a><br>
                                <a class="text-center"><h4>SMK Az-Zahra Sepatan</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="login.php" method="post"> 
                                    <div class="form-group">
                                        <input type="username" class="form-control" placeholder="Username" name="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="pass" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" value="Login" name="login">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>


<?php  
  
include("koneksi.php");  
  
if(isset($_POST['login']))  
{  
    $username=$_POST['username'];  
    $pass=md5($_POST['pass']);   
  
    $run=mysqli_query($con, "select * from user WHERE username='$username' AND password='$pass'");  
	$xrun = mysqli_fetch_assoc($run);
    if(mysqli_num_rows($run) > 0)  
    {  
        echo "<script>window.open('index.php','_self')</script>";  
  
        $_SESSION['id']=$xrun['id'];
  
    }  
    else  
    {  
      echo "<script>alert('Username or/and Password are incorrect!')</script>";  
    }  
}  
?>  
