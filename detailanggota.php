<?php
	$conn=mysqli_connect("localhost","root","","diangsistem");

	
        global $conn;
        $namapemain = $_POST['rowid'];

        // mengambil data berdasarkan namapemain
        $result= mysqli_query($conn, "SELECT * FROM anggota WHERE namapemain='$namapemain'");
        $i=1 ;
        foreach ($result as $baris) { ?>
            <table class="table ">
                <tr>
                    <td>No: <?= $i; ?></td>
                </tr>
                <tr>
                    <td>Nama User : <?php echo $baris['namalengkap']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon : <?php echo $baris['telepon']; ?></td>
                </tr>
                 <tr>
                    <td>Alamat : <?php echo $baris['alamat']; ?></td>
                </tr>
                 <tr>
                    <td>Nomor Telepon : <?php echo $baris['telepon']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin : <?php echo $baris['jeniskelamin']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir : <?php echo $baris['tanggallahir']; ?></td> 
                </tr>
                <br>
                <hr>
                <hr>
                <br>
                <?php $i++ ;?>
            </table>
        <?php 
 
        }
    
?>