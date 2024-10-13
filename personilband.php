<?php
	session_start();
	require 'function.php';


	if (!isset($_SESSION["login"]))
	{
		header("Location: login.php");
		exit;
	}
	$conn=mysqli_connect("localhost","root","","diangsistem");
	$namapemain=$_SESSION["namapemain"];

	$jumlahdataperhalaman=6;
	$jumlahdata=count(query("SELECT * FROM anggota WHERE namapemain='$namapemain'"));
	$jumlahhalaman=ceil($jumlahdata/$jumlahdataperhalaman);
	$halamanaktif=(isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awaldata=($jumlahdataperhalaman*$halamanaktif)-$jumlahdataperhalaman;
		
	$result=mysqli_query($conn, "SELECT * FROM anggota WHERE namapemain='$namapemain'  LIMIT $awaldata,$jumlahdataperhalaman ");
	
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
									<h1><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Informasi</h1>
								</div>
							</a>
						</li>
						<li><a href="profileuser.php">
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
								<div class="menu-personilband"></div>
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
					<h1>DATA PERSONIL BAND</h1>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Telepon</th>
									<th>Alamat</th>
									<th>Jenis Kelamin</th>
									<th>Tanggal Lahir</th>
									<th colspan="2">Opsi</th>
								</tr>
								<?php $i=1 ;?>
								<?php while($row=mysqli_fetch_assoc($result)): ?>
								<tr>
									<td><?= $i ;?></td>
									<td><?= $row["namalengkap"] ;?></td>
									<td><?= $row["telepon"] ;?></td>
									<td><?= $row["alamat"] ;?></td>
									<td><?= $row["jeniskelamin"] ;?></td>
									<td><?= $row["tanggallahir"] ;?></td>
									<td>
										<a class="btn btn-primary" href="ubahpersonil.php?id=<?= $row['id'] ;?>">Update</a>
										<a class="btn btn-primary" href="hapuspersonil.php?id=<?= $row['id']; ?>" onclick="return confirm('apakah data yakin untuk di hapus ?');">Delete</a>
									</td>
								</tr>
								<?php $i++ ;?>
								<?php endwhile; ?>
						</table>
					</div>

					<nav aria-label="Page navigation">
					 	<ul class="pagination">								
							<?php if($halamanaktif > 1) :?>
								<li>
					      			<a href="?halaman=<?=$halamanaktif-1 ;?>" aria-label="Previous">
					        			<span aria-hidden="true">&laquo;</span>
					      			</a>
					    		</li>
							<?php endif; ?>

							<?php for($i=1; $i <= $jumlahhalaman; $i++) : ?>
								<?php if($i == $halamanaktif) :?>
									<li><a href="?halaman=<?= $i ;?>" style="font-weight: bold; color: red;" ><?= $i ;?></a></li>
								<?php else: ?>
									<li><a href="?halaman=<?= $i ;?>"><?= $i ;?></a></li>
								<?php endif; ?>
							<?php endfor; ?>

							<?php if($halamanaktif < $jumlahhalaman) :?>
							    <li>
							      <a href="?halaman=<?=$halamanaktif+1 ;?>" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							      </a>
							    </li>
							<?php endif; ?>
						</ul>
					</nav>
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