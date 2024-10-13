<?php
	require 'function.php';
 	//pendeklarasian input
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

//Penerapan Algoritma SAW
 	$maxC1=0;
 	$maxC2=0;
 	$minC3=1;
 	$maxC4=0;
 	$minC5=1;
 	$maxC6=0;
 	//$jumlah=count($nilai);

 	//bobot
 	$bC1=0.2;
	$bC2=0.15;
	$bC3=0.2;
	$bC4=0.1;
	$bC5=0.05;
	$bC6=0.3;

 	//deklarasi C1
 	$C1=[];
 	for($i=0; $i<$jumlah; $i++)
 	{
 		$C1[]=$bobotA[$i];
 	}

 	var_dump($C1);
 	echo "</br>";
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

 	var_dump($C2);
 	echo "</br>";
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

 	var_dump($C3);
 	echo "</br>";
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

 	var_dump($C4);
 	echo "</br>";
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

 	var_dump($C5);
 	echo "</br>";
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

 	var_dump($C6);
 	echo "</br>";
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

 	echo $maxC1." || ".$maxC2." || ".$minC3." || ".$maxC4." || ".$minC5." || ".$maxC6."</br>";

 	//normalisasi RC1
 	$jC1=count($C1);
 	$RC1=[];
 	for($i=0; $i<$jC1; $i++)
 	{
 		$RC1[]=$C1[$i]/$maxC1;
 	}
 	var_dump($RC1);
 	echo "</br>";

 	//normalisasi RC2
 	$jC2=count($C2);
 	$RC2=[];
 	for($i=0; $i<$jC2; $i++)
 	{
 		$RC2[]=$C2[$i]/$maxC2;
 	}
 	var_dump($RC2);
 	echo "</br>";

 	//normalisasi RC3
 	$jC3=count($C3);
 	$RC3=[];
 	for($i=0; $i<$jC3; $i++)
 	{
 		$RC3[]=$minC3/$C3[$i];
 		
 	}
 	var_dump($RC3);
 	echo "</br>";

 	//normalisasi RC4
 	$jC4=count($C4);
 	$RC4=[];
 	for($i=0; $i<$jC4; $i++)
 	{
 		$RC4[]=$C4[$i]/$maxC4;
 		
 	}
 	var_dump($RC4);
 	echo "</br>";

 	//normalisasi RC5
 	$jC5=count($C5);
 	$RC5=[];
 	for($i=0; $i<$jC5; $i++)
 	{
 		$RC5[]=$minC5/$C5[$i];
 	}
 	var_dump($RC5);
 	echo "</br>";

 	//normalisasi RC6
 	$jC6=count($C6);
 	$RC6=[];
 	for($i=0; $i<$jC6; $i++)
 	{
 		$RC6[]=$C6[$i]/$maxC6;
 		
 	}
 	var_dump($RC6);
 	echo "</br>";

 	//menentukan nilai tertinggi
 	$data=[];
 	for($i=0; $i<$jumlah; $i++)
 	{	
 		$data[]=($C1[$i]*$bC1)+($C2[$i]*$bC2)+($C3[$i]*$bC3)+($C4[$i]*$bC4)+($C5[$i]*$bC5)+($C6[$i]*$bC6);
 	}
 	echo "hasil: </br>";
 	var_dump($data);
?>