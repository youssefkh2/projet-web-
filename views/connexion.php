<?php
	session_start() ; 
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["type"] == "admin")
			header("location:afficherUtilisateurs.php") ; 
		else if ($_SESSION["type"] == "user")
		header("location:../index.php") ; 
	}
	$con = mysqli_connect('localhost','root') ; 
	mysqli_select_db($con,'el_book') ;
	$username = "" ; 
	if (isset($_POST['username'])) 
	{
		$username = $_POST["username"] ; 
		$password = $_POST["password_user"] ; 

		$req = "select * from user where username='$username' and password='$password'" ; 
		$result = $con->query($req) ; 

		if ($result->num_rows>0) 
		{
			$_SESSION['username'] = $username ;
			while ($row = $result->fetch_assoc()) 
			{
				$_SESSION['email'] = $row['email'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['id'] = $row['id'] ;
				$_SESSION['username'] = $row['username'] ;
        $_SESSION['etat'] = $row['etat'] ;
        $_SESSION['nationalite'] = $row['nationalite'] ;
        $_SESSION['numerotele'] = $row['numerotele'] ;
        $_SESSION['sexe'] = $row['sexe'] ;


			}
			if ($_SESSION["type"] == "admin")
				header("location:afficherUtilisateurs.php") ; 
			else if ($_SESSION["type"] == "user")
				header("location:../index.php") ; 
			

		} else {
			echo "Try again." ; 
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h6 class="fw-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" action="">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password_user">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="login">
                </div>
                <a href="forgetpassword.php" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="ajouterUtilisateur.php" class="text-primary">Create</a>
                </div>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
