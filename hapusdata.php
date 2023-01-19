<?php
include_once('koneksi.php');
$no = $_POST['NO'];
$query = "SELECT `FOTO` FROM `data_siswa` WHERE `NO` = '$no' ";
$data_foto = mysqli_query($koneksi, $query);
$foto = mysqli_fetch_assoc($data_foto);

unlink("assets/" . $foto['FOTO']);

$hapus_data = mysqli_query($koneksi, "DELETE from `data_siswa` WHERE `NO` = '$no'");

if ($hapus_data) {
    echo "<p>DATA BERHASILL DIHAPUSSS</p>";
} else {
    echo "<p>DATA BERHASILL DIHAPUSSS</p>";
}

header("location:home.php");

?>