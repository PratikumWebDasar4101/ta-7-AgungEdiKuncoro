<?php
    include ('database.php');
?>
    <h2><center>Data Mahasiswa</center></h2>
    <hr>
    <form action="viewdata.php" method="post">
        <center> Cari NIM : <input type="text" name="cari"><input type="submit" value="Search"> </center>
    </form>
    <table border="1" width="70%" style="border-spacing: 0px; text-align: center" align="center">
        <tr>
            <th width="50%">Nama</th>
            <th width="50%">NIM</th>
            <th width="50%" colspan="2">Option</th>
        </tr>
        <?php
            @$cari = $_POST['cari'];
            $perintah = "SELECT * FROM mahasiswa WHERE nim LIKE '%$cari%'";
            $sql = mysqli_query($conn,$perintah);

        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['nim']?></td>
                <td><a href="hapus.php?nim=<?php echo $row['nim']?>"><input type="button" value="Hapus"></a></td>
                <td><a href="edit.php?nim=<?php echo $row['nim']?>"><input type="button" value="Edit"></a></td>
            </tr>
            <br>
        <?php       
        }
    }else {
        echo "0 Hasil";
    }
?>
</table>
<br><br>
<center><a href="registrasi.php"><input type="button" value="Tambah Data"></a></center>