<?php
    require_once("database.php");

    $nim     = $_GET['nim'];
    $delete = "DELETE FROM mahasiswa WHERE nim='$nim'";

    if (mysqli_query($conn, $delete)) {
        echo "<script> 
                alert('Data berhasil dihapus!'); 
                location='viewdata.php';
             </script>";
    }else {
        echo "Error: " . $delete . "<br?" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>