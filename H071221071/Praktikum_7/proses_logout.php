<?php
$_SESSION = [];

session_start();
// Hapus semua data sesi
session_unset();
// Hancurkan sesi
session_destroy();
// Redirect ke halaman login atau halaman lainnya setelah logout
header("location: login.php"); // Ganti login.php dengan halaman yang sesuai
?>
