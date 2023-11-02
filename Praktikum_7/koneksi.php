<?php
// Database User Login  
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_autentikasi';
$koneksi =  mysqli_connect($server, $username, $password, $dbname);

if ($koneksi) {
    // echo "koneksi berhasil";
}

mysqli_select_db($koneksi, $dbname);

// DataBase Mahasiswa
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_mahasiswa';
    $conn = mysqli_connect($host, $user, $pass, $db);


    if ($conn) {
        // echo "koneksi berhasil";
    }

    mysqli_select_db($conn, $db);
?>