<?php
	$conn=mysqli_connect("localhost","root","","diangsistem");
	function normalisasi($query)
	{
		global $conn;
		$result=mysqli_query($conn, $query);
		$rows=[];
		while($row=mysqli_fetch_array($result))
		{
			$rows[]=$row;
		}
		return $rows;
	}


	function inputdata($data)
	{
		global $conn;
		$namapemain=$data["nama"];
		$pengalaman=$data["pengalaman"];
		$banyak_lokasi=$data["banyak_lokasi"];
		$permintaan_gaji=$data["permintaan_gaji"];
		$umur=$data["umur"];
		$jarak=$data["jarak"];
		$banyak_lagu=$data["banyak_lagu"];

		$result = mysqli_query($conn, "SELECT namapemain FROM datapelamar WHERE namapemain='$namapemain'");

		if(mysqli_fetch_assoc($result))
		{
			echo "<script>
				alert('Anda Sudah Mengajukan Pendaftaran sebelumnya untuk nama band ini!!')
			</script>";
			return false;
		}

		$datapasti=mysqli_query($conn, "SELECT namapemain FROM user WHERE namapemain='$namapemain'");
		$datapasti1=mysqli_fetch_assoc($datapasti);
		if($namapemain!=$datapasti1["namapemain"])
		{
			echo "<script>
				alert('Data Nama Band Tidak Terdaftar!!')
			</script>";
			return false;
		}

		mysqli_query($conn, "INSERT INTO datapelamar VALUES('', '$namapemain','$pengalaman','$banyak_lokasi','$permintaan_gaji','$umur','$jarak','$banyak_lagu')");
		return mysqli_affected_rows($conn);
	}

	function inputinformasi($data)
	{
		global $conn;
		$namapemain=$data;

		mysqli_query($conn, "INSERT INTO informasi VALUES('', '$namapemain')");
		return mysqli_affected_rows($conn);
	}

	function ubah($data)
	{
		global $conn;
		$id=$data["id"];
		$namapemain=$data["nama"];
		$pengalaman=$data["pengalaman"];
		$banyak_lokasi=$data["banyak_lokasi"];
		$permintaan_gaji=$data["permintaan_gaji"];
		$umur=$data["umur"];
		$jarak=$data["jarak"];
		$banyak_lagu=$data["banyak_lagu"];

		$query = "UPDATE datapelamar SET 
			namapemain = '$namapemain',
			pengalaman = '$pengalaman',
			banyak_lokasi = '$banyak_lokasi',
			permintaan_gaji = '$permintaan_gaji',
			umur = '$umur',
			jarak = '$jarak',
			banyak_lagu = '$banyak_lagu'
			WHERE id = $id
		";



		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}
	

	function ubahpersonil($data)
	{
		global $conn;
		$id=$data["id"];
		$namalengkap=$data["namalengkap"];
		$telepon=$data["telepon"];
		$alamat=$data["alamat"];
		$jeniskelamin=$data["jeniskelamin"];
		$tanggallahir=$data["tanggallahir"];
	

		$query = "UPDATE anggota SET 
			namalengkap = '$namalengkap',
			telepon = '$telepon',
			alamat = '$alamat',
			jeniskelamin = '$jeniskelamin',
			tanggallahir = '$tanggallahir'
			WHERE id = $id
		";



		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function hapus($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM datapelamar WHERE id=$id");

		return mysqli_affected_rows($conn);

	}

	function hapusinformasi($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM informasi WHERE id=$id");

		return mysqli_affected_rows($conn);

	}

	function hapuspersonil($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM anggota WHERE id=$id");

		return mysqli_affected_rows($conn);
	}

	function hapusdatauser($namapemain)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM user WHERE namapemain='$namapemain'");
		mysqli_query($conn, "DELETE FROM profileuser WHERE namapemain='$namapemain'");

		return mysqli_affected_rows($conn);

	}

	function query($data)
	{
		global $conn;
		$result=mysqli_query($conn, $data);
		$data=[];
		while($jumlahdata=mysqli_fetch_assoc($result))
		{
			$data[]=$jumlahdata;
		}
		return $data;
	}

	function registrasi($data)
	{
		global $conn;
		$namapemain=$data["nama"];
		$username =strtolower(stripslashes($data["username"]));
		$password=mysqli_real_escape_string($conn, $data["password"]);
		$password2=mysqli_real_escape_string($conn, $data["password2"]);

		$result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");

		if(mysqli_fetch_assoc($result))
		{
			echo "<script>
				alert('username sudah terdaftar!!')
			</script>";
			return false;

		}

		$result = mysqli_query($conn, "SELECT namapemain FROM user WHERE namapemain='$namapemain'");
		if(mysqli_fetch_assoc($result))
		{
			echo "<script>
				alert('namapemain sudah terdaftar, tolong registrasi ulang!!')
			</script>";
			return false;

		}

		if($password !== $password2)
		{
			echo "<script>
				alert('konfirmasi password tidak sesuai');
			</script>";
			return false;
		}

		$password=password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($conn, "INSERT INTO user VALUES('','$namapemain','$username','$password')");

		return mysqli_affected_rows($conn);
	}

	function profileuser($data)
	{
		global $conn;
		$nama=$data["nama"];
		$namalengkap=$data["namalengkap"];
		$telepon=$data["telepon"];
		$alamat=$data["alamat"];
		$jeniskelamin=$data["jeniskelamin"];
		$tanggallahir=$data["tanggallahir"];
		$gambar=upload();
		if(!$gambar)
		{
			return false;
		}

		$result = mysqli_query($conn, "SELECT namapemain FROM profileuser WHERE namapemain='$nama'");

		if(mysqli_fetch_assoc($result))
		{
			echo "<script>
				alert('Anda Sudah Mendaftarkan Profile Sebelumnya!!')
			</script>";
			return false;
		}

		mysqli_query($conn, "INSERT INTO profileuser VALUES('','$nama','$namalengkap','$telepon','$alamat','$jeniskelamin','$tanggallahir','$gambar')");

		mysqli_query($conn, "INSERT INTO anggota VALUES('','$nama','$namalengkap','$telepon','$alamat','$jeniskelamin','$tanggallahir')");
		return mysqli_affected_rows($conn);
	}

	function tambahanggota($data)
	{
		global $conn;
		$nama=$data["nama"];
		$namalengkap=$data["namalengkap"];
		$telepon=$data["telepon"];
		$alamat=$data["alamat"];
		$jeniskelamin=$data["jeniskelamin"];
		$tanggallahir=$data["tanggallahir"];
		


		mysqli_query($conn, "INSERT INTO anggota VALUES('','$nama','$namalengkap','$telepon','$alamat','$jeniskelamin','$tanggallahir')");
		return mysqli_affected_rows($conn);

	}

	function upload(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error =$_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];
		 //cek apakah tidak ada gambar yang di upload
		if($error === 4)
		{
			echo "<script>
				alert('pilih gambar terlebih dahulu');
			</script>";
			return false;
		}
		//cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg','jpeg','png']; 
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(!in_array($ekstensiGambar, $ekstensiGambarValid))
		{
			echo "<script>
				alert('picture yang anda upload bukan gambar !!');
			</script>";
			return false;
		}

		//cek jika ukuranya terlalu besar
		if($ukuranFile > 1000000)
		{
			echo "<script>
				alert('ukuran gambar terlalu besar');
			</script";
			return false;
		}


		//lolos pengecekan, gambar siap upload

		//generte nama baru
		$namaFileBaru=uniqid();
		$namaFileBaru.='.';
		$namaFileBaru.=$ekstensiGambar;
		move_uploaded_file($tmpName, 'image/'.$namaFileBaru);
		return $namaFileBaru;
	}

	function jumlahlakilaki($data)
	{
		global $conn;
		$result=mysqli_query($conn, $data);
		$data=[];
		while($jumlahdata=mysqli_fetch_array($result))
		{
			$data[]=$jumlahdata;
		}

		$jumlahdata=count($data);
		$lakilaki=0;
		$perempuan=0;
		$jeniskelamin=[];
		for($i=0; $i<$jumlahdata; $i++)
		{
			$jeniskelamin[]=$data[$i];
		}
		var_dump($data);
		var_dump($jeniskelamin);

		
		$cek=$data[3];
		return $cek;

	}


?>