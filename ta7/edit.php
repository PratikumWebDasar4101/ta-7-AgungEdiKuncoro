<?php 
include("database.php");
    
    $nim     = $_GET['nim'];
    $edit   = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $sql    = mysqli_query($conn,$edit); 
    $row    = mysqli_fetch_assoc($sql);
 ?>
<h2><center>Edit Data Mahasiswa</center></h2>
<hr>
    <pre>
        <form method="post">
            Nama            : <input type="text" name="nama" value="<?php echo $row['nama'] ?>"><br>
            NIM             : <input type="text" name="nim" value="<?php echo $row['nim'] ?>"><br>
            Jenis kelamin   : <input type="text" name="gender" value="<?php echo $row['gender'] ?>"><br>
            Pro.Studi       : <input type="text" name="studi" value="<?php echo $row['studi'] ?>"><br>
            Fakultas        : <input type="text" name="fakultas" value="<?php echo $row['fakultas'] ?>"><br>
            Asal            : <input type="text" name="asal" value="<?php echo $row['asal'] ?>"><br>
            Moto            : <input type="text" name="moto" value="<?php echo $row['moto'] ?>"><br><br>
                    <input type="submit" name="submit" value="Simpan"> | <a href="viewdata.php"><input type="button" value="Tampilkan Data Mahasiswa"></a>
        </form>
    </pre>
<?php
    if (isset($_POST['nama'])) {
        $nama       = $_POST['nama'];
		$nim        = $_POST['nim'];
		$gender     = $_POST['gender'];
		$studi      = $_POST['studi'];
		$fakultas   = $_POST['fakultas'];
		$asal       = $_POST['asal'];
		$moto       = $_POST['moto'];
        $sql        = "UPDATE mahasiswa SET nama='$nama', nim='$nim', gender='$gender', studi='$studi',fakultas='$fakultas', asal='$asal', moto='$moto' WHERE nim='$nim'";
        if (mysqli_query($conn, $sql)) {
                echo "<script> 
                        alert('Data sukses diubah.'); 
                        location='viewdata.php';
                     </script>";
        }else {
            echo "Error: " . $sql . "<br?" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }