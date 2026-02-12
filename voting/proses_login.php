<?php

// session adalahtempat menyimpan data sementara di server untuk mengingat siapa yang sedang login
session_start();
include "../../pages/header/config.php";

// jika tombol login di klik 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //                      nama dari input form
    $Username_siswa = $_POST['Username'];
    $Password = $_POST['Pass'];

    // cek db
    $query = mysqli_query($koneksi, "select * from tbl_siswa where Username_siswa='$Username_siswa' AND Password='$Password'");

    // kalau datanya ada

    if (mysqli_num_rows($query) == 1){
        $data = mysqli_fetch_assoc($query);
        // var data siswa(Id_siswa, Nama, Kelas, Jurusan)

        // simpan dalam session
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data ['nama'];
        $_SESSION['Id_siswa'] = $data ['Id_siswa'];

        // kalau berhasil kita arahkan ke index.php
        echo" <script> 
        alert('Login Berhasil');
        window.location= 'pages/index.php';
        </script>";
    }else{
        // kalau gagal 
        echo" <script> 
        alert('Login Gagal');
        window.location= '../pages/login.php';
        </script>";
    }
}
?>