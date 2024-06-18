<?php

$hostname = "localhost";
$userDataBase = "root";
$passwordUser = "";
$dataBaseName = "kuliah_pemrograman_web";

$koneksi = mysqli_connect($hostname, $userDataBase, $passwordUser, $dataBaseName) or die ("Koneksi gagal: " . mysqli_connect_error());

// Lakukan sesuatu setelah koneksi berhasil
// Misalnya:
// echo "Koneksi berhasil!";

?>
