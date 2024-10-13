<?php 
	require 'function.php';
	$id = $_GET['id'];
	if (hapusinformasi($id)>0)
	{
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'tampilandataterpilih.php';
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'tampilandataterpilih.php';
			</script>
		";
	}
?>