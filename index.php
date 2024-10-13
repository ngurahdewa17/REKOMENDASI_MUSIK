
<?php
	session_start();
	require 'function.php';
	if (!isset($_SESSION["login"]))
	{
		header("Location: login.php");
		exit;
	}
	$conn=mysqli_connect("localhost","root","","diangsistem");
	$jumlahdatauser=count(query("SELECT * FROM user"));

	$jumlahdatapendaftar=count(query("SELECT * FROM datapelamar"));

	$result=mysqli_query($conn, "SELECT jeniskelamin FROM profileuser");
	$data=[];
	while($jumlahdata=mysqli_fetch_row($result))
	{
		$data[]=$jumlahdata;
	}

	$jumlahdata=count($data);
	$lakilaki=0;
	$perempuan=0;
	for($i=0; $i<$jumlahdata; $i++)
	{
		if ($data[$i][0]=='Laki-Laki')
		{
			$lakilaki++;
		}
		else if ($data[$i][0]=='Perempuan')
		{
			$perempuan++;
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Perekrutan Pemain</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap/css/style.css" rel="stylesheet">
	 <link href="style.css" rel="stylesheet">
	
	 <link rel="stylesheet" href="icon/font-awesome4/css/font-awesome.min.css">
  
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />-->

	 
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
	      	<li><img src="image/<?= $_SESSION["gambar"] ; ?>" class="img-circle"  style="width: 45px; height: 41px; margin-top: 6px;"></li>

	        <li>

	        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li role="separator" class="divider"></li>
	            <li><a href="login.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
	            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Logout</a></li>
	            <li><a href="registrasi.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Registrasi</a></li>
	          </ul>
	        </li>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container-fluid cover">
		<div class="row">
			<div class="col-md-2 col-sm-6 menu1">
				<div class="menu">
					<div class="header">
						<h1><?= $_SESSION["namapemain"] ;?></h1>
						<hr>
					</div>
					<div class="judulmenu">
						<h1>MENU</h1>
					</div>
					<ul>
						<li><a href="index.php">
								<div class="menu-home"></div>
								<div class="home">
									<h1><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</h1>
								</div>
							</a>
						</li>
						<li>
							<a href="tampilan.php">
								<div class="tampilan">
									<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tampilkan Data</h1>
								</div>
							</a>
						</li>
						<li><a href="proses.php">
								<div class="proses">
									<h1><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>  Proses Data</h1>
								</div>
							</a>
						</li>
						<li><a href="input.php">
								<div class="input">
									<h1><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Input Data</h1>
								</div>
							</a>
						</li>
						<li><a href="profileuser.php">
								<div class="profileuser">
									<h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Input Profile User</h1>
								</div>
							</a>
				
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 kontent1">
				<div class="kontent" style="padding: 10px; ">	
					<div class="row">
						<div class="col-md-3 col-sm-12 col-xs-12">
							<div class="panel panel-primary text-center no-boder bg-color-green" id="jumlahdatauser">
								<div class="panel-body jumlahdatauser">
									<i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
									<h3 style="font-size: 54px;"><?= $jumlahdatauser ;?></h3>
								</div>
								<div class="panel-footer back-footer-green footer-jumlahdatauser">
									Jumlah User
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue" id="jumlahdataperempuan">
                            <div class="panel-body jumlahdataperempuan">
                                <i class="fa fa-venus fa-5x"></i>
                                <h3 style="font-size: 54px;"><?= $perempuan ;?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue footer-jumlahdataperempuan">
                                Jumlah Perempuan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red" id="jumlahdatalakilaki">
                            <div class="panel-body jumlahdatalakilaki">
                                <i class="fa fa-mars fa-5x"></i>
                                <h3 style="font-size: 54px;"><?= $lakilaki ;?></h3>
                            </div>
                            <div class="panel-footer back-footer-red footer-jumlahdatalakilaki">
                                Jumlah Laki-Laki
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown" id="jumlahdatapendaftar">
                            <div class="panel-body jumlahdatapendaftar">
                                <i class="fa fa-users fa-5x"></i>
                                <h3 style="font-size: 54px;"><?= $jumlahdatapendaftar ;?></h3>
                            </div>
                            <div class="panel-footer back-footer-brown footer-jumlahdatapendaftar">
                               Jumlah Pendaftar
                            </div>
                        </div>
                    </div>
				</div>
			<div>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="footer">
			<div class="col-md-12 footer1">
	            <div class="footer-kanan-home col-md-12">
	                  <center><p>Copyright &copy; 2018 - 2019. <a href="www.ngurahsmartfarming.gq"><i class="glyphicon glyphicon-leaf"></i>www.ngurahsmartfarming.gq</a></p></center>
	            </div>
			</div>
		</div>
	</div>
	

	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
   


</body>
</html>