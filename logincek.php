<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = "select * from login where `username` = '$username' and `password` = '$password'";
$ambil_data = mysqli_query($koneksi, $login);
$data = mysqli_fetch_assoc($ambil_data);
if ($data) {
    echo 'data ada';
    echo "<br>";
    if ($data['status'] == 1) {
        // echo 'sudah aktivasi';
        header("location:index.php");
        setcookie('nama_login', $_POST['username']);
    } else {
        // header("location: login.php?pesan=Maaf belum aktivasi");

        header("location: login.php");
    }

} else {
    header("location: login.php?pesan=Maaf data tidak ada");
}
// session_start();
// $_SESSION['username'] = $username;
// $_SESSION['status'] = "login";
// header("location:index.php");
// }else{
// 	header("location:login.php");	

// }

?>