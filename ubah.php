<?php
	require 'function.php';
	$id=$_GET["id"];

	$conn=mysqli_connect("localhost","root","","diangsistem");
	$kar=mysqli_query($conn, "SELECT * FROM datapelamar WHERE id=$id");
	$data=mysqli_fetch_assoc($kar);

	if(isset($_POST['submit']))
	{
		if(ubah($_POST) > 0)
		{
			echo "
					<script>
						alert('data berhasil di ubah');
						document.location.href = 'index.php';
					</script>
				";
		}
		else{
			echo "
					<script>
						alert('data gagal diubah');
						document.location.href = 'ubah'.php';
					</script>
				";
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
	      	<li><img src="image/1.jpg" class="img-circle"></li>

	        <li>

	        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li role="separator" class="divider"></li>
	            <li><a href="#"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
	            <li><a href="#"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Logout</a></li>
	            <li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Registrasi</a></li>
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
						<h1>Widia User</h1>
						<hr>
					</div>
					<div class="judulmenu">
						<h1>MENU</h1>
					</div>
					<ul>
						<li><a href="index.php">
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
								<div class="menu-input"></div>
								<div class="input">
									<h1><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Input Data</h1>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-10 kontent1">
				<div class="kontent">
					<h1>INPUT DATA LAMARAN</h1>
					<hr>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							 <form  method="POST" action="">
							 	  <input type="hidden" name="id" value="<?= $data["id"]; ?>">
								  <div class="form-group">
								    <label for="exampleInputNama">Nama Pemain</label>
								    <input name="nama" type="text" class="form-control" placeholder="nama pemain" value="<?= $data["namapemain"] ;?>" >
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPengalaman">Pengalaman</label>
								    <input name="pengalaman" type="text" class="form-control"  placeholder="pengalaman lama bermain dalam tahun"  value="<?= $data["pengalaman"] ;?>" >
								  </div>
								  <div class="form-group">
								    <label for="exampleInputLokasi">Jumlah Manggung</label>
								    <input name="banyak_lokasi" type="text" class="form-control"  placeholder="jumlah pengalaman pentas"  value="<?= $data["banyak_lokasi"] ;?>">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputGaji">Permintaan Gaji</label>
								    <input name="permintaan_gaji" type="text" class="form-control"  placeholder="banyak permintaan gaji/bulan"  value="<?= $data["permintaan_gaji"] ;?>" >
								  </div>
								  <div class="form-group">
								    <label for="exampleInputUmur">Umur Pemain</label>
								    <input name="umur" type="text" class="form-control"  placeholder="umur"  value="<?= $data["umur"] ;?>" >
								  </div>
								  <div class="form-group">
								    <label for="exampleInputJarak">Jarak Ke Lokasi</label>
								    <input name="jarak" type="text" class="form-control"  placeholder="jarak lokasi rumah sampai tempat manggung"  value="<?= $data["jarak"] ;?>" >
								  </div>
								   <div class="form-group">
								    <label for="exampleInputBanyaklagu">Banyak Lagu</label>
								    <input name="banyak_lagu" type="text" class="form-control"  placeholder="banyak lagu yang bisa dimainkan"  value="<?= $data["banyak_lagu"] ;?>">
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
    


</body>
</html>