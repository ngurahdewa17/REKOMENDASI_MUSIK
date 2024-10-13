<?php 
	session_start();
	require 'function.php';

	if(isset($_SESSION["login"]))
	{
		header("Location: profileuser.php");
		exit;
	}

	if(isset($_SESSION["loginadmin"]))
	{
		header("Location: home_admin.php");
		exit;
	}

	if(isset($_POST["login"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];

		$result=mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
		if(mysqli_num_rows($result) === 1)
		{
			$row=mysqli_fetch_assoc($result);
			if(password_verify($password, $row["password"]))
			{
				$namapemain=$row["namapemain"];
				$kotak=mysqli_query($conn, "SELECT * FROM profileuser WHERE namapemain='$namapemain'");
				if(mysqli_num_rows($kotak) === 1)
				{
					$row1=mysqli_fetch_assoc($kotak);
					$_SESSION["gambar"]=$row1["gambar"];
				}
				else
				{
					$_SESSION["gambar"]="difault.jpg";
				}
				$_SESSION["login"]=true;
				$_SESSION["namapemain"]=$row["namapemain"];
				header("Location: profileuser.php");
				exit;
			}
		}
		$error = true;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Perekrutan Pemain</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap/css/style.css" rel="stylesheet">
	 <link href="style.css" rel="stylesheet">
	  <link href="login.css" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" id="warna" href="#">REKOMENDASI PEMAIN MUSIK</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	   

	        <li>

	        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li role="separator" class="divider"></li>
	            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login User</a></li>
	            <li><a href="loginadmin.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Login Admin</a></li>
	            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Logout</a></li>
	            <li><a href="registrasi.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Registrasi</a></li>
	          </ul>
	        </li>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login">
					<h1>FORM LOGIN USER</h1>
					<hr>
						<?php if(isset($error)): ?>
                    <p style="color:red; font-style: italic;">username / password salah</p>
                  <?php endif;?>
					 <form  method="POST" action="">
					  <div class="form-group">
					    <label for="exampleInputUssername">Username</label>
					    <input name="username" type="text" class="form-control"  placeholder="masukan username">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword">Password</label>
					    <input name="password" type="password" class="form-control"  placeholder="masukan password">
					  </div>
					  <button type="submit" name="login" class="btn btn-primary">Login</button>
					</form>         			
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="footer">
			<div class="col-md-12 footer1">
				<div class="footer-kiri col-sm-2">
          		</div>
	            <div class="footer-kanan col-sm-10">
	                  <p>Copyright &copy; 2018 - 2019. <a href="www.ngurahsmartfarming.gq"><i class="glyphicon glyphicon-leaf"></i>www.ngurahsmartfarming.gq</a></p>
	            </div>
			</div>
		</div>
	</div>
	

	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>