<?php
include "../../pages/header/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $Id_calon = $_POST ['Id_calon'];
   $tanggal = date('Y-m-d H:i:s');
   $Id_siswa = $_SESSION['Id_siswa'];


    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_voting( Id_calon, tanggal, Id_siswa ) VALUES ('$Id_calon','$tanggal','$Id_siswa')");

}
?>