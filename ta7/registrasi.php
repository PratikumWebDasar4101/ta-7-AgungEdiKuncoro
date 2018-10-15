<?php
    include("database.php");    
?>
<form method="post">
    <pre>
    <h3>Isikan Data Diri :</h3>
        Nama        : <input type="text" name="nama"><br>
        NIM         : <input type="text" name="nim"><br>
        Gender      : <input type="radio" name="gender" value="Laki-laki">Laki-laki <input type="radio" name="gender" value="Perempuan">Perempuan<br>
        Pro.Studi   : <select name="studi">
                        <option value="MI">MI</option>
                        <option value="TK">TK</option>
                        <option value="KA">KA</option>
                        <option value="MP">MP</option>
                      </select><br>
        Fakultas    : <select name="fakultas">
                        <option value="FIT">FIT</option>
                        <option value="FTE">FTE</option>
                        <option value="FIK">FIK</option>
                        <option value="FKB">FKB</option>
                      </select><br>
        Asal        : <textarea name="asal" cols="30" rows="10"></textarea><br>
        Moto Hidup  : <input type="text" name="moto"><br><br>
                <input type="submit" value="Simpan"> | <a href="viewdata.php"><input type="button" value="Tampilkan Data Mahasiswa"></a>
    </pre>
</form>
<?php
if (isset($_POST['nama'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $gender     = $_POST['gender'];
    $studi      = $_POST['studi'];
    $fakultas   = $_POST['fakultas'];
    $asal       = $_POST['asal'];
    $moto       = $_POST['moto'];

    $input_mahasiswa = "INSERT INTO mahasiswa(nama, nim, gender, studi, fakultas, asal, moto) 
                        VALUES ('$nama', '$nim', '$gender', '$studi', '$fakultas', '$asal', '$moto')";
    
    if (mysqli_query($conn, $input_mahasiswa)) {
        echo "	<script>
                   alert('Data berhasil di tambah');
                location='viewdata.php';
                </script>";
    }else {
        echo "Error: " . $input_mahasiswa . "<br?" . mysqli_error($conn);
    }
}
?>