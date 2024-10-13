<?php
		require 'function.php';
		$namapemain=$_GET["namapemain"];

		if(inputinformasi($namapemain) > 0)
		{
			echo "
					<script>
						alert('data berhasil di infokan');
						document.location.href = 'proses1admin.php';
					</script>
				";
		}
		else
		{
			echo "
					<script>
						alert('data gagal diinfokan');
						document.location.href = 'proses1admin.php';
					</script>
				";
		}
		
?>