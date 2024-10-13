<?php

	$data1=array('Ngurah','Teguh','Deta');
	$data2=array(50,80,30);
	$data3=array_merge($data1,$data2);
	echo "Testing penggabungan array </br>";
	var_dump($data3);
	
	echo "</br></br>";
	$keyvalue=array_combine($data2, $data1);
	echo "Testing Penggabungan key dan value </br>";
	var_dump($data1);
	echo "</br>";
	var_dump($data2);
		echo "</br>";
			echo "</br>";
	var_dump($keyvalue);
	echo "</br></br>";

	echo "Mendeteksi nilai dalam array </br>";
	if (in_array(50, $keyvalue))
	{
		echo "Ok";
	}
	echo "</br></br>";
	echo "menampilkan nilai key apabila value diketahui </br>";
	$key=array_search(30, $keyvalue);
	echo $key;
	echo "</br></br>";
	
	

	$data5=array('Ngurah','Teguh','Deta');
	$data6=array(50,80,30);
	$gabung=array_combine($data6, $data5);
	$jumlah=count($gabung);
	krsort($gabung);
	$i = 1;
	foreach($gabung as $nilai => $nama){
	echo 'rangking '.$i.' '.$nama.'<br/>';
	$i++;
}
?>