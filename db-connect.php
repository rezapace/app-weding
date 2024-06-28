<?php
// konfigurasi db
$host = 'localhost';
$user = 'root';
$pass = 'p';
$db = 'reza';
$koneksi2 = mysqli_connect($host, $user, $pass, $db); //pastikan urutan nya seperti ini, jangan tertukar

if (!$koneksi2) {
  //jika tidak terkoneksi maka akan tampil error
  die ("Koneksi dengan database gagal: ".mysqli_connect_error());
}

try {
  $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  return 'Connection failed: ' . $e->getMessage();
}

?>