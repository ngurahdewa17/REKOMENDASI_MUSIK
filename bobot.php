<?php
	/*require 'function.php';
	$query="SELECT * FROM bobot";
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
		if($nilai[$i][0]>=1 && $nilai[$i][0]<=2)
		{
			$bobotA[]=0.75;
		}
		else if($nilai[$i][0]>=3 && $nilai[$i][0]<=4)
		{
			$bobotA[]=0.8;
		}
		else if($nilai[$i][0]>=5 && $nilai[$i][0]<=6)
		{
			$bobotA[]=0.85;
		}
		else if($nilai[$i][0]>=7 && $nilai[$i][0]<=8)
		{
			$bobotA[]=0.9;
		}
		else if($nilai[$i][0]>=9 && $nilai[$i][0]<=10)
		{
			$bobotA[]=0.95;
		}
		else if($nilai[$i][0]>=10)
		{
			$bobotA[]=1;
		}
	}

	//Penentuan nilai bobot B | Banyak lokasi | Benefit
	for($i=0; $i<$jumlah; $i++)
	{
		if($nilai[$i][1]<1)
		{
			$bobotB[]=0.15;
		}
		else if($nilai[$i][1]>=1 && $nilai[$i][1]<=10)
		{
			$bobotB[]=0.30;
		}
		else if($nilai[$i][1]>=11 && $nilai[$i][1]<=20)
		{
			$bobotB[]=0.45;
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
			$bobotC[]=0.7;
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

	//Penentuan nilai bobot D | Umur | Benefit
	for($i=0; $i<$jumlah; $i++)
	{
		if($nilai[$i][3]<18)
		{
			$bobotD[]=0.15;
		}
		else if($nilai[$i][3]>=18 && $nilai[$i][3]<=23)
		{
			$bobotD[]=0.3;
		}
		else if($nilai[$i][3]>=24 && $nilai[$i][3]<=29)
		{
			$bobotD[]=0.45;
		}
		else if($nilai[$i][3]>=30 && $nilai[$i][3]<=35)
		{
			$bobotD[]=0.6;
		}
		else if($nilai[$i][3]>=36 && $nilai[$i][3]<=40)
		{
			$bobotD[]=0.75;
		}
		else if($nilai[$i][3]>40)
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
			$bobotF[]=0.30;
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
	/*echo "</br>";

	$A=count($bobotA);
	for($i=0; $i<$A; $i++)
	{
		echo $bobotA[$i]."</br>";
	}
	echo "</br>-----------------</br>";

	$B=count($bobotB);
	for($i=0; $i<$B; $i++)
	{
		echo $bobotB[$i]."</br>";
	}
	echo "</br>-----------------</br>";

	$C=count($bobotC);
	for($i=0; $i<$C; $i++)
	{
		echo $bobotC[$i]."</br>";
	}
	echo "</br>-----------------</br>";

	$D=count($bobotD);
	for($i=0; $i<$D; $i++)
	{
		echo $bobotD[$i]."</br>";
	}
	echo "</br>-----------------</br>";

	$E=count($bobotE);
	for($i=0; $i<$E; $i++)
	{
		echo $bobotE[$i]."</br>";
	}
	echo "</br>-----------------</br>";

	$F=count($bobotF);
	for($i=0; $i<$F; $i++)
	{
		echo $bobotF[$i]."</br>";
	}
	echo "</br>-----------------</br>";
?>