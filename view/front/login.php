<?php
	session_start() ; 
	if (isset($_SESSION["username"]))
	{
		if ($_SESSION["role_user"] == "Administrateur")
			header("location:../back/crudUtilisateur.php") ; 
		else if ($_SESSION["role_user"] == "User")
		header("location:./public/index.html") ; 
	}
	$con = mysqli_connect('localhost','root') ; 
	mysqli_select_db($con,'diversify') ;
	$username = "" ; 
	if (isset($_POST['username'])) 
	{
		$username = $_POST["username"] ; 
		$password = $_POST["password_user"] ; 

		$req = "select * from utilisateurs where username='$username' and password_user='$password'" ; 
		$result = $con->query($req) ; 

		if ($result->num_rows>0) 
		{
			$_SESSION['username'] = $username ;
			while ($row = $result->fetch_assoc()) 
			{
				$_SESSION['nom_prenom_user'] = $row['nom_user'] ." " .$row['prenom_user'];
				$_SESSION['email_user'] = $row['email_user'];
				$_SESSION['tel_user'] = $row['tel_user'];
				$_SESSION['id_user'] = $row['id_user'] ;
				$_SESSION['username'] = $row['username'] ;
				$_SESSION['role_user'] = $row['role_user'];
			}
			if ($_SESSION["role_user"] == "Administrateur")
				header("location:../back/crudUtilisateur.php") ; 
			else if ($_SESSION["role_user"] == "User")
				header("location:./public/index.php") ; 
			die ; 

		} else {
			echo "Try again." ; 
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classimax</title>
  
  <!-- FAVICON -->
  <link href="../../img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="../../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="../../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="../../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="../../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="../../css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">



<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                    <form action="" method="POST">
                        <fieldset class="p-4">
                            <input type="text" name="username" placeholder="Username" class="border p-3 w-100 my-2">
                            <input type="password" name="password_user" placeholder="Password" class="border p-3 w-100 my-2">
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <button type="submit" name="login" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                            <a class="mt-3 d-block  text-primary" href="forgetpassword.php">Forget Password?</a>
                            <a class="mt-3 d-inline-block text-primary" href="signup.php">Register Now</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- JAVASCRIPTS -->
<script src="../../plugins/jQuery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/popper.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="../../plugins/tether/js/tether.min.js"></script>
<script src="../../plugins/raty/jquery.raty-fa.js"></script>
<script src="../../plugins/slick-carousel/slick/slick.min.js"></script>
<script src="../../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="../../plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../../plugins/google-map/gmap.js"></script>
<script src="../../js/script.js"></script>

</body>

</html>