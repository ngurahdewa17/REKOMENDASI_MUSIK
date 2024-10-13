<?php
	$conn=mysqli_connect("localhost","root","","diangsistem");

	
        global $conn;
        $namapemain = $_POST['rowid'];

        // mengambil data berdasarkan namapemain
        $result= mysqli_query($conn, "SELECT * FROM profileuser WHERE namapemain='$namapemain'");
        

        foreach ($result as $baris) { ?>
            <table class="table">
                <tr>
                    <td>Nama Band</td>
                    <td>:</td>
                    <td><?php echo $baris['namapemain']; ?></td>
                </tr>
                <tr>
                    <td>Nama User</td>
                    <td>:</td>
                    <td><?php echo $baris['namalengkap']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td><?php echo $baris['telepon']; ?></td>
                </tr>
                 <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $baris['alamat']; ?></td>
                </tr>
                 <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td><?php echo $baris['telepon']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $baris['jeniskelamin']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $baris['tanggallahir']; ?></td>
                </tr>
            </table>
            <img class="img" src="image/<?=$baris['gambar'] ;?>" width="180px"; height="200px"; style="border:3px solid gray; margin-left: 30px;">
        <?php 
 
        }
    
?>