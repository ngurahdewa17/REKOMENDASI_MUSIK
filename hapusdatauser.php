<?php 
	require 'function.php';
	$namapemain = $_GET['namapemain'];
	if (hapusdatauser($namapemain)>0)
	{
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'tampilanuserlogin.php';
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'tampilanuserlogin.php';
			</script>
		";
	}
?>