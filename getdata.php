<?php
include_once ('koneksi.php');

$id = $_POST['id'];
$ambil_data = mysqli_query($koneksi,"SELECT data_siswa.*,kelas.id,kelas.kelas from data_siswa join data_kelas on data_kelas.no_siswa=data_siswa.no join kelas on kelas.id=data_kelas.id_kelas where `NO` = '$id'");

$ambil_data_kelas = mysqli_query($koneksi, "SELECT * FROM `kelas`");
$data = mysqli_fetch_assoc($ambil_data);
// echo var_dump($data);
?>