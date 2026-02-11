<?php
include "../header/config.php";

$id_siswa= $_GET['id'] ?? null;

mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa= '$id_siswa'");

header("location: siswa.php");
exit;
?>