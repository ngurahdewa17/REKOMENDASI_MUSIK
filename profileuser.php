<?php
	session_start();
	require 'function.php';


	if (!isset($_SESSION["login"]))
	{
		header("Location: login.php");
		exit;
	}

	if(isset($_POST["submit"]))
	{
		if(profileuser($_POST) > 0)
		{
			$namapemain=$_SESSION["namapemain"];
			$result=mysqli_query($conn, "SELECT * FROM profileuser WHERE namapemain = '$namapemain'");
			$row=mysqli_fetch_assoc($result);
			$_SESSION["gambar"]=$row["gambar"];
			echo "<script>
				alert('Data Berhasil Disimpan');
			</script>";
		}
		else{
			echo mysqli_error($conn);
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
	 <link href="jam/jqu/jquery-ui.css" rel="stylesheet">
    <link href="jam/jquery-ui-timepicker.css" rel="stylesheet">
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

	<div class="container-fluid cover">
		<div class="row">
			<div class="col-md-2 menu1">
				<div class="menu">
					<div class="header">
						<h1><?= $_SESSION["namapemain"] ;?></h1>
						<hr>
					</div>
					<div class="judulmenu">
						<h1>MENU</h1>
					</div>
					<ul>
						<li><a href="informasiuser.php">
								<div class="informasiuser">
									<h1><span class=" glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Informasi</h1>
								</div>
							</a>
						</li>
						<li><a href="profileuser.php">
								<div class="menu-profileuser"></div>
								<div class="profileuser">
									<h1><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Input Profile User</h1>
								</div>
							</a>
						</li>
						<li><a href="inputpersonilband.php">
								<div class="inputpersonilband">
									<h1><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Input Personil</h1>
								</div>
							</a>
						</li>
						<li><a href="personilband.php">
								<div class="personilband">
									<h1><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Tampil Personil</h1>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 kontent1">
				<div class="kontent">
					<h1>INPUT PROFILE USER</h1>
					<hr>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<form  method="POST" action=""  enctype="multipart/form-data">
								<input type="hidden" name="nama" value="<?= $_SESSION["namapemain"]; ?>">
							  	<div class="form-group">
							    	<label for="exampleInputNamaLengkap">Nama Lengkap</label>
							    	<input name="namalengkap" type="text" class="form-control" placeholder="nama lengkap">
							  	</div>
							 	<div class="form-group">
							    	<label for="exampleInputNotelepon">Nomor Telepon</label>
							    	<input name="telepon" type="text" class="form-control"  placeholder="input nomor telepon">
							    </div>
							    <div class="form-group">
		                        	<label for="alamat">Alamat</label>
		                            <div>
		                            	<textarea type="text" cols="50" rows="4" name="alamat" class="form-control" id="alamat" placeholder="Alamat"></textarea>
		                        	</div>
		                    	</div>

		                    	<div class="form-group">
		                    		<label for="exampleInputJeniskelamin">Jenis Kelamin</label>
				                    <div class="radio">
										<label>
											<input type="radio" name="jeniskelamin" id="optionsRadios1" value="Laki-Laki" checked>
									    	Laki-Laki
									  	</label>
									</div>
									<div class="radio">
										<label>
									    	<input type="radio" name="jeniskelamin" id="optionsRadios2" value="Perempuan">
									    	Perempuan
									  	</label>
									</div>
								</div>
								<div class="form-group">
                                	<label>Tanggal</label>
                                	<input type="text" class="datepicker form-control penyiram-tanggal" name="tanggallahir" placeholder="masukkan tanggal"> 
                                </div>
		                    	<div class="form-group">
			                        <label for="gambar">Upload foto</label>
			                        <div>
			                            <input type="file" name="gambar"  id="gambar" placeholder="Gambar">
			                        </div>
			                    </div>

			              
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>         			
						</div>
					</div>
				</div>
			<div>
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
    <script src="jam/jqu/jquery-ui.js"></script>
    <script src="jam/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
                $('.datepicker').datepicker({
                    dateFormat:"yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    autoclose:true
                });
            });
    </script>
    


</body>
</html>