<?php
	session_start();
	if (!isset($_SESSION["loginadmin"]))
	{
		header("Location: loginadmin.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Perekrutan Pemain</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap/css/style.css" rel="stylesheet">
	 <link href="style.css" rel="stylesheet">
	

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

	        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hello Admin <?= $_SESSION["namaadmin"] ;?></a></li>
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
						<h1><?= $_SESSION["namaadmin"] ;?></h1>
						<hr>
					</div>
					<div class="judulmenu">
						<h1>MENU</h1>
					</div>
					<ul>
						<li><a href="home_admin.php">
								<div class="home">
									<h1><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</h1>
								</div>
							</a>
						</li>
						<li>
							<a href="tampilanadmin.php">
								<div class="tampilan">
									<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tampilkan Data</h1>
								</div>
							</a>
						</li>
						<li><a href="prosesadmin.php">
								<div class="menu-proses"></div>
								<div class="proses">
									<h1><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>  Proses Data</h1>
								</div>
							</a>
						</li>
						<li><a href="inputadmin.php">
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
					<h1>PROSES DATA</h1>
					<hr>
					<div class="row">
						<div class="col-md-12">
						<?php
							require 'function.php';
						 	//pendeklarasian input
						 
							$query="SELECT pengalaman,banyak_lokasi,permintaan_gaji,umur,jarak,banyak_lagu FROM datapelamar";
						 	$nilai=normalisasi($query);
							$bobotA=[];
							$bobotB=[];
							$bobotC=[];
							$bobotD=[];
							$bobotE=[];
							$bobotF=[];

							$jumlah=count($nilai);

							//Penentuan nilai bobot A| Pengalaman | benefit
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][0]<1)
								{
									$bobotA[]=0.15;
								}
								if($nilai[$i][0]>=1 && $nilai[$i][0]<=2)
								{
									$bobotA[]=0.3;
								}
								else if($nilai[$i][0]>=3 && $nilai[$i][0]<=4)
								{
									$bobotA[]=0.45;
								}
								else if($nilai[$i][0]>=5 && $nilai[$i][0]<=6)
								{
									$bobotA[]=0.6;
								}
								else if($nilai[$i][0]>=7 && $nilai[$i][0]<=8)
								{
									$bobotA[]=0.75;
								}
								else if($nilai[$i][0]>=9 && $nilai[$i][0]<=10)
								{
									$bobotA[]=0.9;
								}
								else if($nilai[$i][0]>10)
								{
									$bobotA[]=1;
								}
							}

							//Penentuan nilai bobot B | Banyak lokasi | Benefit
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][1]<1)
								{
									$bobotB[]=0;
								}
								else if($nilai[$i][1]>=1 && $nilai[$i][1]<=10)
								{
									$bobotB[]=0.15;
								}
								else if($nilai[$i][1]>=11 && $nilai[$i][1]<=20)
								{
									$bobotB[]=0.35;
								}
								else if($nilai[$i][1]>=21 && $nilai[$i][1]<=30)
								{
									$bobotB[]=0.6;
								}
								else if($nilai[$i][1]>=31 && $nilai[$i][1]<=40)
								{
									$bobotB[]=0.75;
								}
								else if($nilai[$i][1]>40)
								{
									$bobotB[]=1;
								}
							}

							//Penentuan nilai bobot C | Permintaan Gaji | Cost
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][2]<1000000)
								{
									$bobotC[]=1;
								}
								else if($nilai[$i][2]>=1000000 && $nilai[$i][2]<=1499999)
								{
									$bobotC[]=0.75;
								}
								else if($nilai[$i][2]>=1500000 && $nilai[$i][2]<=2000000)
								{
									$bobotC[]=0.5;
								}
								else if($nilai[$i][2]>2000000)
								{
									$bobotC[]=0.25;
								}
							}

							//Penentuan nilai bobot D | Hasil Tes | Benefit
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][3]<5)
								{
									$bobotD[]=0;
								}
								else if($nilai[$i][3]>=5 && $nilai[$i][3]<=10)
								{
									$bobotD[]=0.15;
								}
								else if($nilai[$i][3]>=11 && $nilai[$i][3]<=35)
								{
									$bobotD[]=0.45;
								}
								else if($nilai[$i][3]>=36 && $nilai[$i][3]<=55)
								{
									$bobotD[]=0.6;
								}
								else if($nilai[$i][3]>=56 && $nilai[$i][3]<=80)
								{
									$bobotD[]=0.75;
								}
								else if($nilai[$i][3]>80)
								{
									$bobotD[]=1;
								}
							}

							//Penentuan nilai bobot E | Jarak | cost
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][4]<1)
								{
									$bobotE[]=1;
								}
								else if($nilai[$i][4]>=1 && $nilai[$i][4]<=3)
								{
									$bobotE[]=0.75;
								}
								else if($nilai[$i][4]>=4 && $nilai[$i][4]<=6)
								{
									$bobotE[]=0.5;
								}
								else if($nilai[$i][4]>6)
								{
									$bobotE[]=0.25;
								}
							}

							//Penentuan nilai bobot F | Banyak lagu | benefit
							for($i=0; $i<$jumlah; $i++)
							{
								if($nilai[$i][5]<25)
								{
									$bobotF[]=0.15;
								}
								if($nilai[$i][5]>=25 && $nilai[$i][5]<=35)
								{
									$bobotF[]=0.3;
								}
								if($nilai[$i][5]>=36 && $nilai[$i][5]<=45)
								{
									$bobotF[]=0.45;
								}
								if($nilai[$i][5]>=46 && $nilai[$i][5]<=55)
								{
									$bobotF[]=0.6;
								}
								if($nilai[$i][5]>=56 && $nilai[$i][5]<=65)
								{
									$bobotF[]=0.75;
								}
								if($nilai[$i][5]>65)
								{
									$bobotF[]=1;
								}
							}

						//Penerapan Algoritma SAW
						 	$maxC1=0;
						 	$maxC2=0;
						 	$minC3=1;
						 	$maxC4=0;
						 	$minC5=1;
						 	$maxC6=0;
						 	//$jumlah=count($nilai);

						 	//bobot
						 	$bC1=0.15;
							$bC2=0.15;
							$bC3=0.15;
							$bC4=0.2;
							$bC5=0.05;
							$bC6=0.3;

						 	//deklarasi C1
						 	$C1=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C1[]=$bobotA[$i];
						 	}


						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$j=$C1[$i];
						 		if($maxC1 < $j) 
						 		{
						 			$maxC1=$j;
						 		}
						 		else if($maxC1>$j)
						 		{
						 			$maxC1=$maxC1;
						 		}
						 		else if($maxC1==$j)
						 		{
						 			$maxC1=$maxC1;
						 		}
						 	}

						 	//deklarasi C2
						 	$C2=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C2[]=$bobotB[$i];
						 	}

						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$j=$C2[$i];
						 		if($maxC2 < $j)
						 		{
						 			$maxC2=$j;
						 		}
						 		else if($maxC2>$j)
						 		{
						 			$maxC2=$maxC2;
						 		}
						 		else if($maxC2==$j)
						 		{
						 			$maxC2=$maxC2;
						 		}
						 	}

						 	//deklarasi C3
						 	$C3=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C3[]=$bobotC[$i];
						 	}

						 	for($i=0; $i<$jumlah; $i++)
						 	{	
						 		$j=$C3[$i];
						 		if($minC3<$j)
						 		{
						 			$minC3=$minC3;
						 		}
						 		else if($minC3>$j)
						 		{
						 			$minC3=$j;
						 		}
						 		else if($minC3==$j)
						 		{
						 			$minC3=$minC3;
						 		}
						 	}

						 	//deklarasi C4
						 	$C4=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C4[]=$bobotD[$i];
						 	}

						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$j=$C4[$i];
						 		if($maxC4 < $j)
						 		{
						 			$maxC4=$j;
						 		}
						 		else if($maxC4>$j)
						 		{
						 			$maxC4=$maxC4;
						 		}
						 		else if($maxC4==$j)
						 		{
						 			$maxC4=$maxC4;
						 		}
						 	}
						 	
							//deklarasi C5
						 	$C5=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C5[]=$bobotE[$i];
						 	}

						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$j=$C5[$i];
						 		if($minC5<$j)
						 		{
						 			$minC5=$minC5;
						 		}
						 		else if($minC5>$j)
						 		{
						 			$minC5=$j;
						 		}
						 		else if($minC5==$j)
						 		{
						 			$minC5=$minC5;
						 		}
						 	}

						 	//deklarasi C6
						 	$C6=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$C6[]=$bobotF[$i];
						 	}

						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$j=$C6[$i];
						 		if($maxC6 < $j)
						 		{
						 			$maxC6=$j;
						 		}
						 		else if($maxC6>$j)
						 		{
						 			$maxC6=$maxC6;
						 		}
						 		else if($maxC6==$j)
						 		{
						 			$maxC6=$maxC6;
						 		}
						 	}



						 	//normalisasi RC1
						 	$jC1=count($C1);
						 	$RC1=[];
						 	for($i=0; $i<$jC1; $i++)
						 	{
						 		$RC1[]=$C1[$i]/$maxC1;
						 	}


						 	//normalisasi RC2
						 	$jC2=count($C2);
						 	$RC2=[];
						 	for($i=0; $i<$jC2; $i++)
						 	{
						 		$RC2[]=$C2[$i]/$maxC2;
						 	}


						 	//normalisasi RC3
						 	$jC3=count($C3);
						 	$RC3=[];
						 	for($i=0; $i<$jC3; $i++)
						 	{
						 		$RC3[]=$minC3/$C3[$i];
						 		
						 	}


						 	//normalisasi RC4
						 	$jC4=count($C4);
						 	$RC4=[];
						 	for($i=0; $i<$jC4; $i++)
						 	{
						 		$RC4[]=$C4[$i]/$maxC4;
						 		
						 	}


						 	//normalisasi RC5
						 	$jC5=count($C5);
						 	$RC5=[];
						 	for($i=0; $i<$jC5; $i++)
						 	{
						 		$RC5[]=$minC5/$C5[$i];
						 	}


						 	//normalisasi RC6
						 	$jC6=count($C6);
						 	$RC6=[];
						 	for($i=0; $i<$jC6; $i++)
						 	{
						 		$RC6[]=$C6[$i]/$maxC6;
						 		
						 	}


						 	//menentukan nilai tertinggi
						 	$data=[];
						 	for($i=0; $i<$jumlah; $i++)
						 	{	
						 		$data[]=($RC1[$i]*$bC1)+($RC2[$i]*$bC2)+($RC3[$i]*$bC3)+($RC4[$i]*$bC4)+($RC5[$i]*$bC5)+($RC6[$i]*$bC6);
						 	}



						 	$datanamapemain=mysqli_query($conn, "SELECT namapemain FROM datapelamar");
						 	while($jumlahdata=mysqli_fetch_row($datanamapemain))
							{
								$namapemaingrup[]=$jumlahdata;
							}

							/*echo "Nama Pemain : </br></br>";
							var_dump($namapemaingrup);
							echo "</br></br>";

							echo $namapemaingrup[1][0];*/
							$datanamapemain=[];
							for($i=0; $i<$jumlah; $i++)
							{
								$datanamapemain[]=$namapemaingrup[$i][0];
							}



							$perengkingan=array_combine($data, $datanamapemain);
							krsort($perengkingan);
							$datahasil=array_combine($datanamapemain,$data);
							


							$nilaitertinggi=max($data);
							/*$nilaitertinggi=0;
						 	for($i=0; $i<$jumlah; $i++)
						 	{
						 		$hasil=$data[$i];
						 		if($nilaitertinggi < $hasil)
						 		{
						 			$nilaitertinggi=$hasil;
						 		}
						 		else if($nilaitertinggi>$hasil)
						 		{
						 			$nilaitertinggi=$nilaitertinggi;
						 		}
						 		else if($nilaitertinggi==$hasil)
						 		{
						 			$nilaitertinggi=$nilaitertinggi;
						 		}
						 	}*/
							/*echo "Nilai Tertinggi : </br>";*/
							$key=array_search($nilaitertinggi, $datahasil);
							/*echo "YANG BERHAK LOLOS ADALAH  ".$key."  DENGAN TOTAL NILAI :  ".$nilaitertinggi;
						 	echo "</br></br>";*/
						?>
					
							<p style="font-size: 18px; margin-left: 20px;">Pembobotan :</p>
				
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>No</th>
	  									<th>Nama Band</th>
	  									<th>Pengalaman</th>
	  									<th>Banyak Lokasi</th>
	  									<th>Permintaan Gaji</th>
	  									<th>Hasil Tes</th>
	  									<th>Jarak</th>
	  									<th>Banyak Lagu</th>
	  								</tr>
	  								<?php $no=1 ;?>
	  								<?php for($i=0; $i<$jumlah; $i++){  ?>
	  								<tr>
	  									<td><?= $no ;?></td>
	  									<td><?=$datanamapemain[$i];?></td>
	  									<td><?= $bobotA[$i];?></td>
	  									<td><?= $bobotB[$i]; ?></td>
	  									<td><?= $bobotC[$i]; ?></td>
	  									<td><?= $bobotD[$i]; ?></td>
	  									<td><?= $bobotE[$i]; ?></td>
	  									<td><?= $bobotF[$i]; ?></td>
	  								</tr>
	  								<?php $no++ ;?>
	  								<?php } ;?>
								</table>
							</div>
							</br>
							</br>
							</br>
							<hr style="border:3px solid gray">
							</br>
							</br>
							</br>
							<p style="font-size: 18px; margin-left: 20px;">Penentuan Nilai Max Dan Min :</p>
							</br>
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>No</th>
	  									<th>Pengalaman (MAX)</th>
	  									<th>Banyak Lokasi (MAX)</th>
	  									<th>Permintaan Gaji (MIN)</th>
	  									<th>Hasil Tes (MAX)</th>
	  									<th>Jarak (MIN)</th>
	  									<th>Banyak Lagu (MAX)</th>
	  								</tr>
	  								<tr>
	  									<td>||</td>
	  									<td><?= $maxC1 ;?></td>
	  									<td><?= $maxC2 ;?></td>
	  									<td><?= $minC3 ;?></td>
	  									<td><?= $maxC4 ;?></td>
	  									<td><?= $minC5 ;?></td>
	  									<td><?= $maxC6 ;?></td>
	  								</tr>
								</table>
							</div>
							</br>
							</br>
							</br>
							<hr style="border:3px solid gray">
							</br>
							</br>
							</br>
							<p style="font-size: 18px; margin-left: 20px;"> Tabel Faktor Ternormalisasi :</p>
							</br>
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>No</th>
	  									<th>Nama Band</th>
	  									<th>Pengalaman</th>
	  									<th>Banyak Lokasi</th>
	  									<th>Permintaan Gaji</th>
	  									<th>Hasil Tes</th>
	  									<th>Jarak</th>
	  									<th>Banyak Lagu</th>
	  								</tr>
	  								<?php $no=1 ;?>
	  								<?php for($i=0; $i<$jumlah; $i++){  ?>
	  								<tr>
	  									<td><?= $no ;?></td>
	  									<td><?=$datanamapemain[$i];?></td>
	  									<td><?= $RC1[$i];?></td>
	  									<td><?= $RC2[$i]; ?></td>
	  									<td><?= $RC3[$i]; ?></td>
	  									<td><?= $RC4[$i]; ?></td>
	  									<td><?= $RC5[$i]; ?></td>
	  									<td><?= $RC6[$i]; ?></td>
	  								</tr>
	  								<?php $no++ ;?>
	  								<?php } ;?>
								</table>
							</div>
							</br>
							</br>
							</br>
							<hr style="border:3px solid gray">
							</br>
							</br>
							</br>
							</br>
							<p style="font-size: 18px; margin-left: 20px;"> Hasil Proses Algoritma SAW :</p>
							</br>
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>No</th>
	  									<th>Nama Band</th>
	  									<th>Bobot</th>
	  								</tr>
	  								<?php $no=1 ;?>
	  								<?php for($i=0; $i<$jumlah; $i++){  ?>
	  								<tr>
	  									<td><?= $no ;?></td>
	  									<td><?=$datanamapemain[$i];?></td>
	  									<td><?= $data[$i];?></td>
	  								</tr>
	  								<?php $no++ ;?>
	  								<?php } ;?>
								</table>
							</div>
							</br>
							</br>
							</br>
							<hr style="border:3px solid gray">
							</br>
							</br>
							</br>
							</br>
							<p style="font-size: 18px; margin-left: 20px;"> Perengkingan Pelamar :</p>
							</br>
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>No</th>
	  									<th>Nama Band</th>
	  									<th>Bobot</th>
	  								</tr>
	  								<?php $no=1 ;?>
	  								<?php foreach($perengkingan as $nilai => $nama){  ?>
	  								<tr>
	  									<td><?= $no ;?></td>
	  									<td><?=$nama;?></td>
	  									<td><?=$nilai;?></td>
	  								</tr>
	  								<?php $no++ ;?>
	  								<?php } ;?>
								</table>
							</div>
							</br>
							</br>
							</br>
							<hr style="border:3px solid gray">
							</br>
							</br>
							</br>
							<p style="font-size: 18px; margin-left: 20px;"> Pelamar Yang Terpilih :</p>
							</br>
							<div class="table-responsive">
								<table class="table table-hover">
	  								<tr>
	  									<th>||</th>
	  									<th>Nama Band</th>
	  									<th>Bobot Nila</th>
	  									<th colspan="2">Opsi</th>
	  								</tr>
	  								<tr>
	  									<td>1</td>
	  									<td><?= $key;?></td>
	  									<td><?= $nilaitertinggi;?></td>
	  									<td>
	  										<a class="btn btn-primary" href="informasi.php?namapemain=<?= $key ;?>" onclick="return confirm('apakah data yakin untuk di infokan ?')"">Infokan</a>
	  										<a href="#myModal" class="btn btn-primary btn-small" id="custId" data-toggle="modal" data-id="<?=$key;?>">Detail</a>
	  									</td>
	  								</tr>
								</table>
							</div>
							</br>
							</br>
							</br>
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
	 <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Profile User</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript">
	    $(document).ready(function(){
	        $('#myModal').on('show.bs.modal', function (e) {
	            var rowid = $(e.relatedTarget).data('id');
	            //menggunakan fungsi ajax untuk pengambilan data
	            $.ajax({
	                type : 'post',
	                url : 'detailuser.php',
	                data :  'rowid='+ rowid,
	                success : function(data){
	                $('.fetched-data').html(data);//menampilkan data ke dalam modal
	                }
	            });
	         });
	    });
   </script>


</body>
</html>