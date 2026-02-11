<?php
include "../header/config.php";

$Id_calon= $_GET['Id'] ?? null;

mysqli_query($koneksi, "DELETE FROM tbl_calon_ketua WHERE Id_calon= '$Id_calon'");

header("location: calon_ketua.php");
exit;
?>