<?php 
// $server = "localhost";
// $username = "root";
// $password = "";
// $db = "koperasi";
// $koneksi = mysqli_connect($server, $username, $password, $db);

// if(mysqli_connect_errno()) {
//     echo "Koneksi gagal :".mysqli_connect_error();
// } 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db ="koperasi";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
?> 